@extends('layouts.app')
@section('content')
    @php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location23456790-++: home.php");
    }

    @endphp
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
{{--<div class="container">--}}
{{--<div class="row justify-content-center">--}}
    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="page-content-wrapper ">
                        <!-- end page title end breadcrumb -->
                    <div class="col-md-12">

                <div class="main-content">
                    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
                      <div class="container-fluid">

                        <div class="header-body">
                          <div class="row">
                            <div class="col-xl-3 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Total Contracts</h5>
                                      <span class="h2 font-weight-bold mb-0">{{@$totalContracts}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Total Pending Contract</h5>
                                      <span class="h2 font-weight-bold mb-0">{{@$totalPendingContracts}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-building"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Total Dispatched Contracts</h5>
                                      <span class="h2 font-weight-bold mb-0">{{@$totalDonors}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa fa-gift"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Journal Vouchers</h5>
                                      <span class="h2 font-weight-bold mb-0">{{@$totalJvs}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-thin fa-wallet"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-xl-3 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Total Buyers</h5>
                                      <span class="h2 font-weight-bold mb-0">{{@$totalBuyers}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-thin fa-wallet"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Total Sellers</h5>
                                      <span class="h2 font-weight-bold mb-0">{{@$totalSellers}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-thin fa-wallet"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Bank Payment Voucher</h5>
                                      <span class="h2 font-weight-bold mb-0">{{@$totalBPV}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa fa-bank"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                              <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Bank Receipt Voucher</h5>
                                      <span class="h2 font-weight-bold mb-0">{{@$totalBRV}}</span>
                                    </div>
                                    <div class="col-auto">
                                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa fa-bank"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-md-6"><img src="{{ asset('public/images/dashboard.png') }}" width="900"></div> -->
                    </div>
                    </div><!-- container -->
                </div> <!-- Page content Wrapper -->
            </div> <!-- content -->
            <footer class="footer">
                © Copyright 2020. All rights reserved to Doaba Foundation
            </footer>
        </div>
        <!-- End Right content here -->
    </div>
{{--</div>--}}
    <!-- END wrapper -->
    {{--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>--}}
{{--</div>--}}
@endsection
