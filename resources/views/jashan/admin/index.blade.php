@extends('admin.layouts.app')
@section('content')
 <div class="container-fluid">
    <!-- start page title -->
    <!--<div class="row">-->
    <!--    <div class="col-12">-->
    <!--        <div class="page-title-box">-->
    <!--            <div class="page-title-right">-->
    <!--                <form class="form-inline">-->
    <!--                    <div class="form-group">-->
    <!--                        <div class="input-group">-->
    <!--                            <input type="text" class="form-control form-control-light" id="dash-daterange">-->
    <!--                            <div class="input-group-append">-->
    <!--                                <span class="input-group-text bg-primary border-primary text-white">-->
    <!--                                    <i class="mdi mdi-calendar-range font-13"></i>-->
    <!--                                </span>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <a href="javascript: void(0);" class="btn btn-primary ml-2">-->
    <!--                        <i class="mdi mdi-autorenew"></i>-->
    <!--                    </a>-->
    <!--                    <a href="javascript: void(0);" class="btn btn-primary ml-1">-->
    <!--                        <i class="mdi mdi-filter-variant"></i>-->
    <!--                    </a>-->
    <!--                </form>-->
    <!--            </div>-->
    <!--            <h4 class="page-title">Dashboard</h4>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- end page title -->
    <div class="row mt-3">
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class="mdi mdi-account-multiple widget-icon"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Customers</h5>
                    <h3 class="mt-3 mb-3">36,254</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                        <span class="text-nowrap">Since last month</span>  
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class="mdi mdi-cart-plus widget-icon"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Orders</h5>
                    <h3 class="mt-3 mb-3">5,543</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

    <div class="col-lg-3">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-right">
                    <i class="mdi mdi-currency-usd widget-icon"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Average Revenue">Revenue</h5>
                <h3 class="mt-3 mb-3">$6,254</h3>
                <p class="mb-0 text-muted">
                    <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <div class="col-lg-3">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-right">
                    <i class="mdi mdi-pulse widget-icon"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Growth">Growth</h5>
                <h3 class="mt-3 mb-3">+ 30.56%</h3>
                <p class="mb-0 text-muted">
                    <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

            
    </div>

</div>
@endsection