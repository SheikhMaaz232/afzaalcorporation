@extends('layouts.app')
@section('content')
    <!-- Begin page -->

    <div id="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="page-content-wrapper ">
                    @if (session()->has('message'))
                        <div class="alert" style="background-color: #a9e8a8">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active">List Of Cities</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Of Cities</h4>
                                </div>
                            </div>
                        </div>
                        <div class="form-group button-items mb-0 text-right">
                            <a href="{{ route('city.create') }}" class="btn btn-primary waves-effect waves-light">
                                Add City</a>
                        </div>
                        <br>
                        <!-- end page title end breadcrumb -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <form action="{{ route('city.list') }}" method="get" id="form-search">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" value="{{ $param }}" name="param"
                                                                id="param" class="form-control search" id="input-search"
                                                                placeholder="Search City...">
                                                            <span class="input-group-prepend">
                                                                {{-- <button type="submit" class="btn btn-primary" disabled><i
                                                                            class="fa fa-search"></i></button> --}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group ml-3">
                                                    <span class="input-group-prepend" style="margin-top: 0px;">
                                                        <button type="submit" class="btn btn-primary" value="Search"
                                                            id="search-button"><i class="fa fa-search"></i>&nbsp;
                                                            Search</button>

                                                    </span>
                                                </div>

                                                <div class="form-group">
                                                    <span class="input-group-prepend" style="margin-top: 0px">
                                                        <a href="{{ route('city.list') }}" class="btn btn-primary"
                                                            value="Search" id="clear-filter" style="margin-left: 10px">Clear
                                                            Filter</a>

                                                    </span>
                                                </div>



                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card m-b-30">
                                    <div class="card-body">

                                        <table class="table table-hover subject-table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>City Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($cities as $city)
                                                    <tr id="row_{{ $city->id }}">
                                                        <td width="300">{{ $city->id }}</td>
                                                        <td width="300">{{ $city->name }}</td>
                                                        <td width="300">
                                                            <a href="{{ route('city.edit', ['id' => $city->id]) }}"
                                                                title="Edit"><i class="fa fa-edit"></i></a>
                                                            {{-- @if ((!empty($permission->edit_access) && $permission->edit_access == 1) || Auth::user()->is_admin == 1)

                                                                @endif --}}
                                                            {{-- @if ((!empty($permission->delete_access) && $permission->delete_access == 1) || Auth::user()->is_admin == 1)

                                                                @endif --}}
                                                            <a href="#" title="Delete"><i class="fa fa-trash-o delete"
                                                                    data-id="{{ $city->id }}"></i></a>
                                                            {{-- <a href="#"><i class="fa fa-eye"></i></a> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>


                                    <hr>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-end">
                                            {!! !empty($cities) ? $cities->appends(request()->query())->render() : '' !!}
                                        </ul>
                                    </nav>
                                    {{-- <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-end">
                                            {!! $cities->appends(request()->query())->links() !!}
                                        </ul>
                                    </nav> --}}
                                </div>

                            </div> <!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-7">
                                <div class="card m-b-30">

                                </div>
                            </div>
                        </div>


                    </div><!-- container -->


                </div> <!-- Page content Wrapper -->

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                var cityId = $(this).data('id');
                bootbox.confirm("Do you really want to delete record?", function(result) {
                    if (result) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{{ url('city/delete') }}' + '/' + cityId,
                            type: 'DELETE',
                            data: {
                                id: cityId
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    $("#row_" + cityId).remove();
                                    bootbox.alert(response.message);
                                } else if (response.error) {
                                    bootbox.alert(response.error);
                                }
                            }
                        });
                    }
                });
            });
        });

        $("#clear-filter").on('click', function() {
            $("#voucher_no").val('');
            $("#paid_to").val('');
            $("#order_by").val('');
            $("#form-search").submit();
        })
    </script>
@endsection
