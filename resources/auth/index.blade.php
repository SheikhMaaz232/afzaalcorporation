@extends('layouts.app')
@section('content')
    <!-- Begin page -->

    <div id="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="page-content-wrapper ">
                    @if(session()->has('message'))
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
                                            <li class="breadcrumb-item"><a href="#">Doaba Foundation</a></li>
                                            <li class="breadcrumb-item active">List Of Users</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Of Users</h4>
                                </div>
                            </div>
                        </div>

            <!-- end page title end breadcrumb -->

                        <div class="form-group button-items mb-0 text-right">
                            <a href="{{ route('register') }}" class="btn btn-primary waves-effect waves-light">Create User</a>
                        </div>
                        <br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="{{ route('donor.search') }}" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <h6 class="light-dark w-100">Search User</h6>
                                                    <input type="text" id="query" name="query" class="form-control" placeholder="Search" value="{{ isset($params) ? $params['query'] : '' }}">
                                                        <span class="input-group-prepend">
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6 class="light-dark">Sort By</h6>
                                            <select name="order_by" id="order_by" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                                <option value="">Select</option>
                                                <option value="name">Name</option>
                                                <option value="created_at">Created at</option>
                                            </select>
                                        </div>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr id="row_{{$user->id}}">
                                        <th scope="row">{{ $user->name }}</th>
                                        <td>{{ $user->email }}</td>
                                        <td><img src="{{ !empty($user->avatar) ? asset('public/uploads/users/'.$user->avatar) : asset('public/images/placeholder.jpg') }}" width="50" alt="user" class="rounded-circle"></td>
                                        <td>
                                            <a href="{{ route('user.edit',['id'=>$user->id]) }}"><i class="fa fa-edit"></i></a>
                                            <a href="#" ><i class="fa fa-trash-o delete" data-id="{{ $user->id }}"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr>

                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end">
                                    {!! $users->render() !!}
                                </ul>
                            </nav>
                        </div>
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
        $(document).ready(function(){
            $('.delete').click(function(){
                var el = this;
                var userId = $(this).data('id');
                bootbox.confirm("Do you really want to delete record?", function(result) {
                    if(result){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{{ url('users/delete') }}'+'/'+userId,
                            type: 'DELETE',
                            data: { id:userId },
                            success: function(response){
                                console.log(response);
                                if(response.success){
                                    $("#row_"+userId).remove();
                                    bootbox.alert(response.message);
                                }else if(response.error){
                                    bootbox.alert(response.error);
                                }
                            }
                        });
                    }
                });
            });
       });
    </script>

@endsection