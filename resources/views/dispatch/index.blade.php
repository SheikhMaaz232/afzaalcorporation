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
                                            <li class="breadcrumb-item active">List Of Dispatches</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Of Dispatches</h4>
                                </div>
                            </div>
                        </div>
                      <!--  <div class="form-group button-items mb-0 text-right">
                            <a href="{{ route('contracts.create') }}" class="btn btn-primary waves-effect waves-light">Create
                                Contract</a>
                        </div>-->
                        <br>
                        <!-- end page title end breadcrumb -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <form action="{{ route('dispatch.list') }}" method="get" id="form-search">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" value="{{ $param }}" name="contract"
                                                                id="contract" class="form-control search" id="input-search"
                                                                placeholder="Contract No">
                                                            <span class="input-group-prepend">
                                                                {{-- <button type="submit" class="btn btn-primary" disabled><i
                                                                            class="fa fa-search"></i></button> --}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <select class="select2 form-control mb-3 custom-select" name="buyer"
                                                                id="buyer" style="width: 100%; height:36px;">
                                                                <option value="">Select</option>
                                                                @foreach ($dropDownData['buyers'] as $key => $value)
                                                                    <option value="{{ $key }}"
                                                                        {{ (old('buyer_id') == $key ? 'selected' : '') || (!empty($dispatch->buyer_id) ? collect($dispatch->buyer_id)->contains($key) : '') ? 'selected' : '' }}>
                                                                        {{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <select class="select2 form-control mb-3 custom-select" name="seller"
                                                                id="seller" style="width: 100%; height:36px;">
                                                                <option value="">Select</option>
                                                                @foreach ($dropDownData['sellers'] as $key => $value)
                                                                    <option value="{{ $key }}"
                                                                        {{ (old('seller_id') == $key ? 'selected' : '') || (!empty($contract->seller_id) ? collect($contract->seller_id)->contains($key) : '') ? 'selected' : '' }}>
                                                                        {{ $value }}</option>
                                                                @endforeach
                                                            </select>
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
                                                        <a href="{{ route('dispatch.list') }}" class="btn btn-primary"
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
                                                    <th>CNo</th>
                                                    <th>Buyer Name</th>
                                                    <th>Seller Name</th>
                                                    <th>Quantity</th>
                                                    <th>Rate</th>
                                                    {{--  <th>Mois</th>
                                                    <th>Trash</th>  --}}
                                                    {{--  <th>Mode Of Payment</th>  --}}
                                                    <th>Description</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @if($contracts)
                                                @foreach ($contracts as $contract)
                                                    <tr id="row_{{ $contract->id }}">
                                                        <td>{{ $contract->id }}</td>
                                                        <td width="150">{{ $contract->buyer->name }}</td>
                                                        <td width="200">{{ $contract->seller->name }}</td>
                                                        <td>{{ $contract->quantity }}</td>
                                                        <td>{{ $contract->rate }}</td>
                                                        {{--  <td>{{ $contract->moisture }}</td>
                                                        <td>{{ $contract->trash }}</td>  --}}
                                                        {{--  <td>{{ $contract->payment->name }}</td>  --}}
                                                        <td  style="word-break: break-word">{{ $contract->remarks }}</td>
                                                        <td width="150">
                                                            <a href="{{ route('dispatch.dispatch-entry', ['id' => $contract->id]) }}"
                                                                title="Enter Dispatch Info"><i class="fa fa-truck"></i></a>
                                                            <a href="{{ route('dispatch.dispatch-entry', ['id' => $contract->id]) }}"
                                                               title="Enter Mill Weight" ><i class="fa fa-balance-scale"></i></a>
                                                            <a href="{{ route('dispatch.dispatch-entry', ['id' => $contract->id]) }}"
                                                               title="Enter Payment"><i class="fa fa-money"></i></a>

                                                            {{-- @if ((!empty($permission->edit_access) && $permission->edit_access == 1) || Auth::user()->is_admin == 1)
                                                            @endif
                                                            @if ((!empty($permission->delete_access) && $permission->delete_access == 1) || Auth::user()->is_admin == 1)

                                                            @endif --}}
                                                            {{-- <a href="#"><i class="fa fa-eye"></i></a> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                            <td><h5>No Contracts Found</h5></td>

                                            @endif

                                            </tbody>

                                        </table>
                                        <hr>
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-end">
                                                {!! !empty($contracts) ? $contracts->appends(request()->query())->render() : '' !!}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

                    </div><!-- container -->
                    @include('partials.email-modal')


                </div> <!-- Page content Wrapper -->

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                var contractId = $(this).data('id');
                console.log(contractId);
                bootbox.confirm("Do you really want to delete record?", function(result) {
                    if (result) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{{ url('contract/delete') }}' + '/' + contractId,
                            type: 'DELETE',
                            data: {
                                id: contractId
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    console.log(response)
                                    $("#row_" + contractId).remove();
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
