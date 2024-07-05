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
                                        <li class="breadcrumb-item active">Employee</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Employee</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-body bpv-form">
                                    <form action="{{ !empty($employee) ? route('employee.update') : route('employee.save') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" id="id"
                                            value="{{ isset($employee->id) ? $employee->id : '' }}" />
                                        <div class="form-inline">
                                            <div class="form-group">

                                            </div>
                                            <div class="form-group">

                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Employee Name<span style="color: red">*</span>
                                                </h6>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ old('name', !empty($employee->name) ? $employee->name : '') }}"
                                                    placeholder="Enter Employee Name" maxlength="30">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Designation<span style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="designation" id="designation"
                                                    value="{{ old('designation', !empty($employee->designation) ? $employee->designation : '') }}"
                                                    placeholder="Enter Designation" maxlength="30">
                                                @error('designation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Date of Birth<span style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="date_of_birth" id="date_of_birth"
                                                    value="{{ old('date_of_birth', !empty($employee->date_of_birth) ? $employee->date_of_birth : '') }}"
                                                    placeholder="Enter Date Of Birth" maxlength="70">
                                                @error('date_of_birth')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">CNIC Number</h6>
                                                <input type="text" class="form-control" name="cnic_number"
                                                    id="cnic_number"
                                                    value="{{ old('cnic_number', !empty($employee->cnic_number) ? $employee->cnic_number : '') }}"
                                                    placeholder="Enter CNIC Number" maxlength="70">
                                                @error('cnic_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Joining Date<span
                                                        style="color: red">*</span>
                                                </h6>
                                                <input type="text" class="form-control" name="date_of_joining"
                                                    id="date_of_joining"
                                                    value="{{ old('date_of_joining', !empty($employee->date_of_joining) ? $employee->date_of_joining : '') }}"
                                                    placeholder="Enter Joining Date" maxlength="15">
                                                @error('date_of_joining')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Sallary<span style="color: red">*</span>
                                                </h6>
                                                <input type="text" class="form-control" name="salary"
                                                    id="salary"
                                                    value="{{ old('salary', !empty($employee->salary) ? $employee->salary : '') }}"
                                                    placeholder="Enter Salary Amount" maxlength="15">
                                                @error('salary')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-inline">

                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Phone Number<span
                                                        style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="phone"
                                                    id="phone"
                                                    value="{{ old('phone', !empty($employee->phone) ? $employee->phone : '') }}"
                                                    placeholder="Enter Phone Number" maxlength="70">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Cell<span style="color: red">*</span>
                                                </h6>
                                                <input type="text" class="form-control" name="cell"
                                                    id="cell"
                                                    value="{{ old('cell', !empty($employee->cell) ? $employee->cell : '') }}"
                                                    placeholder="Enter Cell Number" maxlength="15">
                                                @error('cell')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">City<span style="color: red">*</span></h6>
                                                <select class="select2 form-control mb-3 custom-select" name="city_id"
                                                    id="city_id" style="width: 100%; height:36px;">
                                                    <option value="">Select</option>
                                                    @foreach ($dropDownData['cities'] as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ (old('city_id') == $key ? 'selected' : '') || (!empty($employee->city_id) ? collect($employee->city_id)->contains($key) : '') ? 'selected' : '' }}>
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
                                                placeholder="Enter Address">{{ old('address', !empty($employee->address) ? $employee->address : '') }}</textarea>
                                        </div>


                                        <div class="form-group">
                                            <h6 class="light-dark w-100">Remarks</h6>
                                            <textarea id="textarea" class="form-control" name="remarks" id="remarks" maxlength="225" rows="3"
                                                placeholder="Enter Remarks">{{ old('remarks', !empty($employee->remarks) ? $employee->remarks : '') }}</textarea>
                                        </div>

                                        <div class="form-group button-items mb-0 text-right">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                @if (!isset($employee))
                                                    Save
                                                @else
                                                    Update
                                                @endif
                                            </button>
                                            <a href="{{ route('employee.list') }}"
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
