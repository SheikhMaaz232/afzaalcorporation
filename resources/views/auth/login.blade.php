@extends('layouts.app')
@section('content')
    @php

        session_start();

        //include '../pages/koneksi.php';
        if (isset($_SESSION['username'])) {
            header('location: home.php');
        }

        // $financial_years = \App\Models\FinancialYear::all();
    @endphp

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    .login-container {
        width: 100%;
        max-width: 400px;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
    }

    .logo img {
        width: 100px;
        margin-bottom: 20px;
    }

    .login-form {
        display: flex;
        flex-direction: column;
    }

    .login-form h2 {
        margin-bottom: 20px;
        color: #333333;
    }

    .input-group {
        margin-bottom: 15px;
        text-align: left;
    }

    .input-group label {
        display: block;
        margin-bottom: 5px;
        color: #333333;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #cccccc;
        border-radius: 4px;
    }

    button {
        padding: 10px;
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #0056b3;
    }

    .company-title {
        font-size: 24px;
        font-weight: bold;
        margin-right: 20px;
        color: #007bff;
    }

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="login-container">
    <div class="header">
        <div class="company-title"
       <h2> {{ config('constants.company_title') }}</h2></div>
        <h5>{{ config('constants.company_sub_title') }}</h5>
        <div class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
        </div>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h2>Login</h2>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
@endsection
