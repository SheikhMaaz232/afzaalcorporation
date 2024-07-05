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
                                        <li class="breadcrumb-item active">Buyer</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Buyer</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-body bpv-form">
                                    <form action="{{ !empty($buyer) ? route('buyer.update') : route('buyer.save') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" id="id"
                                            value="{{ isset($buyer->id) ? $buyer->id : '' }}" />
                                        <div class="form-inline">
                                            <div class="form-group">

                                            </div>
                                            <div class="form-group">

                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Buyer Name<span style="color: red">*</span>
                                                </h6>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ old('name', !empty($buyer->name) ? $buyer->name : '') }}"
                                                    placeholder="Enter Buyer Name" maxlength="30">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Email</h6>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    value="{{ old('email', !empty($buyer->email) ? $buyer->email : '') }}"
                                                    placeholder="Enter Email" maxlength="30">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Fax</h6>
                                                <input type="text" class="form-control" name="fax" id="fax"
                                                    value="{{ old('fax', !empty($buyer->fax) ? $buyer->fax : '') }}"
                                                    placeholder="Enter Fax Number" maxlength="70">
                                                @error('fax')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">City<span style="color: red">*</span></h6>
                                                <select class="select2 form-control mb-3 custom-select" name="city_id"
                                                    id="city_id" style="width: 100%; height:36px;">
                                                    <option value="">Select</option>
                                                    @foreach ($dropDownData['cities'] as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ (old('city_id') == $key ? 'selected' : '') || (!empty($buyer->city_id) ? collect($buyer->city_id)->contains($key) : '') ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('city_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Office Contact Number<span style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="phone_office"
                                                    id="phone_office"
                                                    value="{{ old('phone_office', !empty($buyer->phone_office) ? $buyer->phone_office : '') }}"
                                                    placeholder="Enter Office Contact Number" maxlength="70">
                                                @error('phone_office')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Mill Contact Number<span
                                                        style="color: red">*</span>
                                                </h6>
                                                <input type="text" class="form-control" name="phone_mills"
                                                    id="phone_mills"
                                                    value="{{ old('phone_mills', !empty($buyer->phone_mills) ? $buyer->phone_mills : '') }}"
                                                    placeholder="Enter Mill Contact Number" maxlength="15">
                                                @error('phone_mills')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="form-group">
                                            <h6 class="light-dark w-100">Office Address<span style="color: red">*</span></h6>
                                            <textarea id="textarea" class="form-control" name="address_office" id="address_office" maxlength="225" rows="3"
                                                placeholder="Enter Office Address">{{ old('address_office', !empty($buyer->address_office) ? $buyer->address_office : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="light-dark w-100">Mill Address<span style="color: red">*</span></h6>
                                            <textarea id="textarea" class="form-control" name="address_mills" id="address_mills" maxlength="225" rows="3"
                                                placeholder="Enter Mill Address">{{ old('address_mills', !empty($buyer->address_mills) ? $buyer->address_mills : '') }}</textarea>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Sale Tax Number<span
                                                        style="color: red">*</span>
                                                </h6>
                                                <input type="text" class="form-control" name="sale_tax_no"
                                                    id="sale_tax_no"
                                                    value="{{ old('sale_tax_no', !empty($buyer->sale_tax_no) ? $buyer->sale_tax_no : '') }}"
                                                    placeholder="Enter Sale Tax Number" maxlength="15">
                                                @error('sale_tax_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <h6 class="light-dark w-100">National Tax Number<span
                                                        style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="national_tax_no"
                                                    id="national_tax_no"
                                                    value="{{ old('national_tax_no', !empty($buyer->national_tax_no) ? $buyer->national_tax_no : '') }}"
                                                    placeholder="Enter National Tax Number" maxlength="70">
                                                @error('national_tax_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Website</h6>
                                                <input type="text" class="form-control" name="website"
                                                    id="website"
                                                    value="{{ old('website', !empty($buyer->website) ? $buyer->website : '') }}"
                                                    placeholder="Enter Website URL" maxlength="15">
                                                @error('website')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="light-dark w-100">Remarks</h6>
                                            <textarea id="textarea" class="form-control" name="remarks" id="remarks" maxlength="225" rows="3"
                                                placeholder="Enter Remarks">{{ old('remarks', !empty($buyer->remarks) ? $buyer->remarks : '') }}</textarea>
                                        </div>

                                        <div class="form-group button-items mb-0 text-right">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                @if (!isset($buyer))
                                                    Save
                                                @else
                                                    Update
                                                @endif
                                            </button>
                                            <a href="{{ route('buyer.list') }}"
                                                class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                            {{-- @if ((!empty($permission) && $permission->insert_access == 1) || Auth::user()->is_admin == 1)

                                            @endif --}}
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
