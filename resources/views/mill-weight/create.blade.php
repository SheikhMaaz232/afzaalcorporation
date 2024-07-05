@extends('layouts.app')
@section('content')
<style>
    .col-md-2-5 {
        flex: 0 0 15%;
        max-width: 15%;
    }
    .form-group {
        margin-right: 1.5%;
    }
</style>
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
                                    <li class="breadcrumb-item active"><a href="{{ url('contracts/list') }}">List Of
                                            Contracts</a></li>
                                    <li class="breadcrumb-item active">Mill Weight</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Mill Weight</h4>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">


                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-title">Mill Weight</h4>

                        <div class="card m-b-30">
                            <div class="card-body bpv-form">

                                <form
                                    action="{{  route('mill-weight.save') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-inline">

                                        <div class="form-group col-md-2-5">
                                            <h6 class="light-dark w-100">Date of Contract<span
                                                    style="color: red">*</span>
                                            </h6>
                                            <div class="input-daterange input-group" id="date">
                                                <input type="text" name="date" class="form-control"
                                                       value="{{ old('date', !empty($brv->date) ? \Carbon\Carbon::parse($brv->date )->format('d-m-Y') : '') }}"
                                                       placeholder="Select Date" readonly/>
                                                @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <input type="hidden" name="contract_id" value="{{ $contract->id }}">
                                            <input type="hidden" name="buyer_id" value="{{ $contract->buyer_id }}">
                                            <input type="hidden" name="seller_id" value="{{ $contract->seller_id }}">
                                        </div>
                                    </div>
                                    <br />


                                    <div class="form-inline col-md-12">

                                        <div class="row justify-content-between">
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Lot#<span style="color: red">*</span>

                                                    <input type="number" class="form-control" name="lot_no" id="lot_no"
                                                       value="{{ old('lot_no', !empty($contract->lot_no) ? $contract->lot_no : '') }}"
                                                       placeholder="" maxlength="70">
                                            </div>
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Dispatch Qty<span style="color: red">*</span></h6>
                                                    <input type="number" class="form-control" name="dispatch_quantity" id="dispatch_quantity"
                                                       value="{{ old('dispatch_quantity', !empty($contract->dispatch_quantity) ? $contract->dispatch_quantity : '') }}"
                                                       placeholder="" maxlength="70">
                                            </div>
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Factory Weight<span style="color: red">*</span></h6>

                                                <input type="number" class="form-control" name="factory_weight" id="factory_weight"
                                                       value="{{ old('factory_weight')}}"
                                                       placeholder="" maxlength="70">
                                            </div>
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Moisture</h6>

                                                <input type="number" class="form-control" name="moisture" id="moisture"
                                                       value=""
                                                       placeholder="" maxlength="70">
                                            </div>
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Trash</h6>

                                                <input type="number" class="form-control" name="trash" id="trash"
                                                       value="{{ old('trash') }}"
                                                       placeholder="" maxlength="70">
                                            </div>
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Tare</h6>

                                                <input type="number" class="form-control" name="tare" id="tare"
                                                       value="{{ old('tare') }}"
                                                       placeholder="" maxlength="70">
                                            </div>
                                        </div>
                                    </div>
                                    <br />

                                    <div class="form-inline col-md-12">
                                        <div class="row justify-content-between">
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Net Weight<span style="color: red">*</span>

                                                    <input type="number" class="form-control" name="net_weight" id="net_weight"
                                                           value="{{ old('net_weight') }}"
                                                           placeholder="" maxlength="70" readonly>
                                            </div>
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Rate</h6>
                                                <input type="number" class="form-control" name="rate" id="rate"
                                                       value="{{ $contract->rate }}"
                                                       placeholder="" maxlength="70" readonly>
                                            </div>
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Amount</h6>

                                                <input type="number" class="form-control" name="value" id="value"
                                                       value="{{ old('value')}}"
                                                       placeholder="" maxlength="70" readonly>
                                            </div>
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Bilty</h6>

                                                <input type="text" class="form-control" name="bilty_no" id="bilty_no"
                                                       value="{{ old('bilty_no') }}"
                                                       placeholder="" maxlength="70">
                                            </div>
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Freight</h6>

                                                <input type="number" class="form-control" name="freight" id="freight"
                                                       value="{{ old('freight') }}"
                                                       placeholder="" maxlength="70">
                                            </div>
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Vehicle No</h6>

                                                <input type="text" class="form-control" name="vehicle_number" id="vehicle_number"
                                                       value="{{ old('vehicle_number') }}"
                                                       placeholder="" maxlength="70">
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="form-inline col-md-12">
                                        <div class="row justify-content-between">
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Goods Name</h6>

                                                    <input type="number" class="form-control" name="trash1" id="trash1"
                                                           value="{{ old('trash1', !empty($contract->trash1) ? $contract->trash1 : '') }}"
                                                           placeholder="Trash 1" maxlength="70">
                                            </div>
                                            <div class="form-group col-md-2-5">
                                                <h6 class="light-dark w-100">Cell No</h6>
                                                <input type="number" class="form-control" name="trash2" id="trash2"
                                                       value="{{ old('trash2', !empty($contract->trash2) ? $contract->trash2 : '') }}"
                                                       placeholder="Trash 2" maxlength="70">
                                            </div>
                                        </div>
                                    </div>
-->
                                    <div class="form-group">
                                        <h6 class="light-dark w-100">Remarks</h6>
                                        <textarea id="textarea" class="form-control" name="remarks" id="remarks"
                                                  maxlength="225" rows="3"
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
                                        <a href="{{ route('dispatch.list') }}"
                                           class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                        {{-- @if ((!empty($permission) && $permission->insert_access == 1) ||
                                        Auth::user()->is_admin == 1)

                                        @endif --}}
                                    </div>

                                </form>

                            </div>
                        </div>

                        <h4>List of Mill Weights</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <table class="table table-hover subject-table">
                                            <thead>
                                            <tr>
                                                <th>CNo</th>
                                                <th>Lot No</th>
                                                <th>Disp Qty</th>
                                                <th>Factory Weight</th>
                                                <th>Net Factory Weight</th>
                                                <th>Mill Weight</th>
                                                <th>Mois</th>
                                                <th>Trash</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($millWeights as $millWeight)
                                            <tr id="row_{{ $contract->id }}">
                                                <td>{{ $millWeight->contract_id }}</td>
                                                <td width="150">{{ $millWeight->lot_no }}</td>
                                                <td width="200">{{ $millWeight->dispatch_quantity }}</td>
                                                <td>{{ $millWeight->factory_weight }}</td>
                                                <td>{{ $millWeight->net_weight }}</td>
                                                <td>{{ $millWeight->mill_weight }}</td>
                                                <td>{{ $millWeight->moisture }}</td>
                                                <td>{{ $millWeight->trash }}</td>
                                                <td width="150">
                                                    {{-- <a href="{{ route('millWeight.dispatch-entry', ['id' => $dispatch->id]) }}"
                                                       title="Enter Mill Weight" ><i class="fa fa-balance-scale"></i></a> --}}
                                                    <a href="{{ route('mill-weight.dispatch-entry', ['id' => $dispatch->id]) }}"
                                                       title="Enter Payment"><i class="fa fa-money"></i></a>

                                                    {{-- @if ((!empty($permission->edit_access) && $permission->edit_access == 1) || Auth::user()->is_admin == 1)
                                                    @endif
                                                    @if ((!empty($permission->delete_access) && $permission->delete_access == 1) || Auth::user()->is_admin == 1)

                                                    @endif --}}
                                                    {{-- <a href="#"><i class="fa fa-eye"></i></a> --}}
                                                </td>
                                            </tr>
                                            @endforeach

                                            </tbody>

                                        </table>
                                        <hr>
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-end">
                                                {!! !empty($contracts) ? $contracts->appends(request()->query())->render() : '' !!}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {
        $("#factory_weight").focusout(function() {
            $("#net_weight").val($("#factory_weight").val());
        });

        $("#tare").focusout(function() {
            let deduction = parseInt($("#moisture").val()) + parseInt($("#trash").val()) + parseInt($("#tare").val())
            console.log(deduction);
            $("#net_weight").val($("#factory_weight").val() - parseInt(deduction));
            let maund = $("#net_weight").val() / 37.324;
            console.log(maund);
            var rate = $("#rate").val();
            var calculatedValue = maund * rate;
            var roundedValue = roundTo(calculatedValue, 2);
            $("#value").val(roundedValue);
        });

        function roundTo(value, decimals) {
            return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
        }
    });
</script>
@endsection
