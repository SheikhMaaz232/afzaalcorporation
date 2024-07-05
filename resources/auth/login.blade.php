@extends('layouts.app')
@section('content')
    @php

        session_start();

//include '../pages/koneksi.php';
        if(isset($_SESSION['username'])){header("location: home.php");}

            $financial_years = \App\Models\FinancialYear::all();
    @endphp

<article class="login-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 pr-0">
                <div class="form-wrap">
                    <div class="form-inner">
                        <img src="{{ asset('images/logo.jpg') }}" style="margin-left: 110px">
                        <h1 style="text-align: center">SHEIKH MUNIR ENTERPRISES</h1>
                        <h6 style="text-align: center">Cotton Broker System</h6>
                        <p style="text-align: center; margin-bottom: 10px">Sign In</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username" style="height: 35px; margin-bottom: -35px">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"  name="password" required autocomplete="current-password" style="height: 35px; margin-bottom: -5px">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h6 class="light-dark">Select Financial Year*</h6>
                                <select class="select2 form-control mb-3 custom-select" name="financial_year_id"
                                        id="financial_year_id"
                                        style="width: 100%; height:36px;">
                                    {{--<option value="">Select</option>--}}
                                    @foreach( $financial_years as $year)
                                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                                    @endforeach
                                </select>
                                @error('bank_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-left: -15px">
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="margin-top: -17px">

                                        <label class="form-check-label" for="remember" style="background-color: #5dbcd2; margin-left: 3px; margin-top: 5px">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0" style="margin-top: -10px !important;">
                                <button style="background-color: #429aa8 !important; border-color: #429aa8">Login</button>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #000000; margin-left: -10px;">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </form>
                        {{-- <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
