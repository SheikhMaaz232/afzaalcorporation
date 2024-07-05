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
                                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                                        <li class="breadcrumb-item active"><a href="{{ url('contracts/list') }}">List Of Contracts</a></li>
                                        <li class="breadcrumb-item active">Add New Contract</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add New Contract</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-body bpv-form">
                                    <form action="{{ !empty($contract) ? route('contracts.update') : route('contracts.save') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" id="id"
                                            value="{{ isset($contract->id) ? $contract->id : '' }}" />
                                        <div class="form-inline">
                                            <div class="form-group">

                                            </div>
                                            <div class="form-group">

                                            </div>
                                        </div>
                                        <div class="form-inline">
                                            @if(empty($contract))
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Contract No<span style="color: red">*</span>
                                                    </h6>
                                                    <input type="text" class="form-control col-md-3" name="cont" id="cont"
                                                    value="{{ $contractNo }}" disabled
                                                    placeholder="" maxlength="70">
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Date of Contract<span style="color: red">*</span>
                                                </h6>
                                                <div class="input-daterange input-group" id="contract-date">
                                                    <input type="text" name="contract_date" class="form-control"
                                                           value="{{ old('date', !empty($brv->date) ? \Carbon\Carbon::parse($brv->date )->format('d-m-Y') : '') }}"
                                                           placeholder="Select Date" readonly/>
                                                    @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                                    @enderror
                                                                </div>
                                           </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Buyer Name<span style="color: red">*</span>
                                                </h6>
                                                <select class="select2 form-control mb-3 custom-select" name="buyer_id"
                                                    id="buyer_id" style="width: 100%; height:36px;">
                                                    <option value="">Select</option>
                                                    @foreach ($dropDownData['buyers'] as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ (old('buyer_id') == $key ? 'selected' : '') || (!empty($contract->buyer_id) ? collect($contract->buyer_id)->contains($key) : '') ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('buyer_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark">Seller<span style="color: red">*</span></h6>
                                                <select class="select2 form-control mb-3 custom-select" name="seller_id"
                                                    id="seller" style="width: 100%; height:36px;">
                                                    <option value="">Select</option>
                                                    @foreach ($dropDownData['sellers'] as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ (old('seller_id') == $key ? 'selected' : '') || (!empty($contract->seller_id) ? collect($contract->seller_id)->contains($key) : '') ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('seller_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Quantity/Bales<span style="color: red">*</span></h6>
                                                <input type="number" class="form-control" name="quantity" id="quantity"
                                                    value="{{ old('quantity', !empty($contract->quantity) ? $contract->quantity : '') }}"
                                                    placeholder="Quantity" maxlength="70">
                                                @error('quantity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Rate<span style="color: red">*</span></h6>
                                                <input type="number" class="form-control" name="rate" id="rate"
                                                value="{{ old('rate', !empty($contract->rate) ? $contract->rate : '') }}"
                                                placeholder="Rate" maxlength="70">
                                            @error('rate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Moisture</h6>
                                                            <input type="number" class="form-control" name="moisture" id="moisture"
                                                                   value="{{ old('moisture', !empty($contract->moisture) ? $contract->moisture : '') }}"
                                                                   placeholder="Moisture" maxlength="70">
                                                            @error('moisture')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Moisture Type<span style="color: red">*</span></h6>
                                                            <select class="form-control mb-3 custom-select" name="moisture_type"
                                                                    id="moisture_type" style="width: 100%; height:36px;">
                                                                <option value="">Select</option>
                                                                <option value="VISIBLE"
                                                                    {{ (old('moisture_type') == 'VISIBLE' ? 'selected' : '') || (!empty($contract->moisture_type) ? collect($contract->moisture_type)->contains('VISIBLE') : '') ? 'selected' : '' }}>
                                                                    VISIBLE
                                                                </option>
                                                                <option value="IN-VISIBLE"
                                                                    {{ (old('moisture_type') == 'IN-VISIBLE' ? 'selected' : '') || (!empty($contract->moisture_type) ? collect($contract->moisture_type)->contains('IN-VISIBLE') : '') ? 'selected' : '' }}>
                                                                    IN-VISIBLE
                                                                </option>
                                                            </select>
                                                            @error('moisture_type')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                            </div>
                                        </div>


                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Trash</h6>
                                                            <input type="number" class="form-control" name="trash" id="trash"
                                                                   value="{{ old('trash', !empty($contract->trash) ? $contract->trash : '') }}"
                                                                   placeholder="Trash" maxlength="70">
                                                            @error('trash')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Trash Type<span style="color: red">*</span></h6>
                                                            <select class="form-control mb-3 custom-select" name="trash_type"
                                                                    id="trash_type" style="width: 100%; height:36px;">
                                                                <option value="">Select</option>
                                                                <option value="VISIBLE"
                                                                    {{ (old('trash_type') == 'VISIBLE' ? 'selected' : '') || (!empty($contract->trash_type) ? collect($contract->trash_type)->contains('VISIBLE') : '') ? 'selected' : '' }}>
                                                                    VISIBLE
                                                                </option>
                                                                <option value="IN-VISIBLE"
                                                                    {{ (old('trash_type') == 'IN-VISIBLE' ? 'selected' : '') || (!empty($contract->trash_type) ? collect($contract->trash_type)->contains('IN-VISIBLE') : '') ? 'selected' : '' }}>
                                                                    IN-VISIBLE
                                                                </option>
                                                            </select>
                                                            @error('trash_type')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Delivery</h6>
                                                <input type="text" class="form-control" name="delivery" id="delivery"
                                                       value="{{ old('delivery', !empty($contract->delivery) ? $contract->delivery : '') }}"
                                                       placeholder="Delivery" maxlength="70">
                                                @error('delivery')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Mode of Payment<span style="color: red">*</span></h6>
                                                    <select class="form-control mb-3 custom-select" name="payment_id"
                                                            id="payment_id" style="width: 100%; height:36px;">
                                                        <option value="">Select</option>
                                                        @foreach ($dropDownData['modeOfPayments'] as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ (old('payment_id') == $key ? 'selected' : '') || (!empty($contract->payment_id) ? collect($contract->payment_id)->contains($key) : '') ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('moisture_type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Weight</h6>
                                                <input type="text" class="form-control" name="weight" id="weight"
                                                       value="{{ old('weight', !empty($contract->weight) ? $contract->weight : '') }}"
                                                       placeholder="Final at mill" maxlength="70">
                                                @error('weight')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group detail">
                                            <h6 class="light-dark w-100">Remarks</h6>
                                            <textarea id="detail" class="form-control detail" name="remarks" rows="10" maxlength="225" rows="3"
                                                placeholder="Enter Remarks">{{ old('remarks', !empty($contract->remarks) ? $contract->remarks : '') }}</textarea>
                                        </div>

                                        <div class="form-group button-items mb-0 text-right">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                @if (!isset($contract))
                                                    Save
                                                @else
                                                    Update
                                                @endif
                                            </button>
                                            <a href="{{ route('contracts.list') }}"
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
    <script src="{{ asset('js/contract.js') }}"></script>
    <script>
         var config = {
                routes: {
                    getSellerDetail: "{{ url('contracts/get-seller-detail') }}",
                },
            }
    </script>
@endsection
