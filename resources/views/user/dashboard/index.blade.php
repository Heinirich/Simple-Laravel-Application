@extends('user.layouts.master') @section('content')
<div class="ec-content-wrapper">
    <div class="content">
        <!-- Top Statistics -->
        <div class="row">
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-1">
                    <div class="card-body">
                        <h2 class="mb-1">{{ count(inter_products('all'))}}</h2>
                        <p>Products</p>
                        <span class="mdi mdi-account-arrow-left"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">{{ count(inter_users('all'))}}</h2>
                        <p>Users</p>
                        <span class="mdi mdi-account"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-3">
                    <div class="card-body">
                        <h2 class="mb-1">{{env('CURRENCY')}}</h2>
                        <p>Default Currency</p>
                        <span class="mdi mdi-currency-usd"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-4">
                    <div class="card-body">
                        <h2 class="mb-1">{{count(inter_users('registered_today'))}}</h2>
                        <p>User Reg. Today</p>
                        <span class="mdi mdi-clock"></span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row" style="display:none;">
            <div class="col-xl-8 col-md-12 p-b-15">
                <!-- User activity statistics -->
                <div class="card card-default" id="user-activity">
                    <div class="no-gutters">
                        <div>
                            <div class="card-header justify-content-between">
                                <h2>User Activity</h2>
                                <div class="date-range-report ">
                                    <span></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="userActivityContent">
                                    <div class="tab-pane fade show active" id="user" role="tabpanel">
                                        <canvas id="activity" class="chartjs"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex flex-wrap bg-white border-top">
                                <a href="#" class="text-uppercase py-3">In-Detail Overview</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 p-b-15">
                <div class="card card-default">
                    <div class="card-header flex-column align-items-start">
                        <h2>Current Users</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="currentUser" class="chartjs"></canvas>
                    </div>
                    <div class="card-footer d-flex flex-wrap bg-white border-top">
                        <a href="#" class="text-uppercase py-3">In-Detail Overview</a>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-12 p-b-15">
                <!-- Recent Order Table -->
                <div class="card card-table-border-none card-default recent-orders" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <h2>Recent Products</h2>
                    </div>
                    <div class="card-body pt-0 pb-5">

                        @livewire('product-component',['ch'=>$ch])
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- End Content -->
</div>
@endsection