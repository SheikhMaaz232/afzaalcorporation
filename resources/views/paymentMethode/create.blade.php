@extends('layouts.app')
@section('content')
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="page-content-wrapper ">
                    @if (session()->has('message'))
                        <div class="alert" style="background-color: #a9e8a8">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="btn-group float-right">
                                    <ol class="breadcrumb hide-phone p-0 m-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Add Payment Methode</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Payment Methode</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card m-b-30">
                                <div class="card-body bpv-form">
                                    <form action="{{ !empty($paymentMethode) ? route('paymentMethode.update') : route('paymentMethode.save') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" id="id"
                                            value="{{ isset($paymentMethode->id) ? $paymentMethode->id : '' }}" />

                                        <div class="form-group">
                                            <h6 class="light-dark w-100">Payment Methode<span style="color: red">*</span></h6>
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ old('name', !empty($paymentMethode->name) ? $paymentMethode->name : '') }}"
                                                placeholder="Enter Payment Methode " maxlength="30" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            {{-- @error('cnic_back')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror --}}
                                        </div>

                                        <div class="form-group button-items mb-0 text-right">

                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                @if (!isset($paymentMethode))
                                                    Save
                                                @else
                                                    Update
                                                @endif
                                            </button>
                                            <a href="{{ route('paymentMethode.list') }}"
                                                class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
