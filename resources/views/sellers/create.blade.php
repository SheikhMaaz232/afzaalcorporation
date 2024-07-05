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
                                        <li class="breadcrumb-item active">Seller</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Seller</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-body bpv-form">
                                    <form action="{{  !empty($seller) ? route('seller.update') : route('seller.save')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" id="id"
                                            value="{{ isset($seller->id) ? $seller->id : '' }}" />
                                            <div class="form-inline">
                                                <div class="form-group">

                                                </div>
                                                <div class="form-group">

                                                </div>
                                            </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Seller Name<span style="color: red">*</span>
                                                </h6>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ old('name', !empty($seller->name) ? $seller->name : '') }}"
                                                    placeholder="Enter Seller Name" maxlength="30" >
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Email</h6>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    value="{{ old('email', !empty($seller->email) ? $seller->email : '') }}"
                                                    placeholder="Enter Email" maxlength="30" >
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Phone Number
                                                </h6>
                                                <input type="text" class="form-control" name="phone" id="phone"
                                                    value="{{ old('phone', !empty($seller->phone) ? $seller->phone : '') }}"
                                                    placeholder="Enter Phone Number" maxlength="15" >
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Fax</h6>
                                                <input type="text" class="form-control" name="fax" id="fax"
                                                    value="{{ old('fax', !empty($seller->fax) ? $seller->fax : '') }}"
                                                    placeholder="Enter Fax Number" maxlength="70">
                                                @error('fax')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Website</h6>
                                                <input type="text" class="form-control" name="website" id="website"
                                                    value="{{ old('website', !empty($seller->website) ? $seller->website : '') }}"
                                                    placeholder="Enter Website URL" maxlength="70">
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">City<span style="color: red">*</span></h6>
                                                <select class="select2 form-control mb-3 custom-select" name="city_id"
                                                    id="city_id" style="width: 100%; height:36px;" >
                                                    <option value="">Select</option>
                                                    @foreach ($dropDownData['cities'] as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ (old('city_id') == $key ? 'selected' : '') || (!empty($seller->city_id) ? collect($seller->city_id)->contains($key) : '') ? 'selected' : '' }}>
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

                                        <div class="form-group">
                                            <h6 class="light-dark w-100">Address</h6>
                                            <textarea id="textarea" class="form-control" name="address" id="address" maxlength="225" rows="3"
                                                placeholder="Enter Address">{{ old('address', !empty($seller->address) ? $seller->address : '') }}</textarea>
                                        </div>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Sale Tax Number<span style="color: red">*</span>
                                                </h6>
                                                <input type="text" class="form-control" name="sale_tax_no" id="sale_tax_no"
                                                    value="{{ old('sale_tax_no', !empty($seller->sale_tax_no) ? $seller->sale_tax_no : '') }}"
                                                    placeholder="Enter Sale Tax Number" maxlength="15" >
                                                @error('sale_tax_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <h6 class="light-dark w-100">National Tax Number<span style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="national_tax_no" id="national_tax_no"
                                                    value="{{ old('national_tax_no', !empty($seller->national_tax_no) ? $seller->national_tax_no : '') }}"
                                                    placeholder="Enter National Tax Number" maxlength="70" >
                                                @error('national_tax_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Bank Detail <small>(Please use Shift+Enter key to the jump to next line)</small><span style="color: red">*</span>
                                                </h6>
                                                <textarea id="textarea" class="form-control" rows="12" name="bank_detail" id="bank_detail" maxlength="225" rows="3"
                                                          placeholder="Enter Remarks">{{ old('bank_detail', !empty($seller->bank_detail) ? $seller->bank_detail : '') }}</textarea>
                                                @error('bank_detail')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        <div class="form-group">
                                            <h6 class="light-dark w-100">Remarks <small>(Please use Shift+Enter key to jump to the next line)</small></h6>
                                            <textarea id="textarea" class="form-control" name="remarks" id="remarks" maxlength="225" rows="3"
                                                placeholder="Enter Remarks">{{ old('remarks', !empty($seller->remarks) ? $seller->remarks : '') }}</textarea>
                                        </div>

                                        <div class="form-group button-items mb-0 text-right">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                @if (!isset($seller))
                                                    Save
                                                @else
                                                    Update
                                                @endif
                                            </button>
                                            <a href="{{ route('seller.list') }}"
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
