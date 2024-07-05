@extends('layouts.app')
@section('content')
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
                                            <li class="breadcrumb-item active">User Registration</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">User Registration</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body bpv-form project-management donor-reg">
                                    <form method="POST" action="{{ isset($user->id) ? route('user.update') : route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id"
                                               value="{{ isset($user->id) ? $user->id : '' }}"/>
                            <div class="form-group">
                                <label>Name<span style="color: red">*</span></label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{  old('name', !empty($user->name) ? $user->name : '') }}"  autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email<span style="color: red">*</span></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', !empty($user->email) ? $user->email : '') }}" >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password<span style="color: red">*</span></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Confirm Password<span style="color: red">*</span></label>
                                <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password">

                            </div>
                                        <div class="form-group">
                                            <h6 class="light-dark">User Type</h6>
                                                Is Admin: <input type="checkbox"  name="is_admin"  value="1" {{ old('is_admin') && $user->is_admin == old('is_admin')? 'checked' : ''}}   @if(@$user->is_admin == 1) checked @endif>

                                            @error('is_admin')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="avatar" class="form-control">&nbsp;&nbsp;
                            </div>
                            <br>
                            <div class="form-group button-items mb-0 text-right">
                                                <a href="{{ route('users.list') }}" class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">@if(!isset($user)) Save @else Update @endif</button>
                                            </div>
                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div><!-- container -->


                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->
    </div>
@endsection