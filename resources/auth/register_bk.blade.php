@extends('layouts.app')

@section('content')
<article class="login-sec signup-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 pr-0">
                <div class="form-wrap">
                    <div class="form-inner">
                        <h1>Welcome to Doaba Foundation</h1>
                        <p>Please fill out the information below to sign up</p>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password">

                            </div>

                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="avatar" class="form-control">&nbsp;&nbsp;
                            </div>
                            <div class="form-group mb-0">
                                <button>Sign Up</button>
                            </div>
                        </form>
                        <p>Already have an account? <a href="">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection