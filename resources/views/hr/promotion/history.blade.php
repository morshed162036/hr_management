@extends('layout.main')

@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/pickers/daterange/daterangepicker.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/themes/semi-dark-layout.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Promotion History</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Employee Promotion Details
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">

    {{-- Validation Error Message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success: </strong>{{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error: </strong>{{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
    <!-- Basic Inputs start -->
    <section class="simple-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Search Employee By ID</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('promotion.history')}}" method="post" enctype="multipart/form-data"> @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h5>Employee ID</h5>
                                            <div class="controls">
                                                <input type="text" name="employee_id" class="form-control" placeholder="Employee Id" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h5 style="visibility: hidden">hgjg</h5>
                                            <div class="controls">
                                                <input type="submit" name="text" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($employee)
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Employee ID</h5>
                                                <input type="text" name="name" class="form-control" placeholder="Your Name" readonly value="{{ $employee->employee_id }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Employee Name</h5>
                                                <input type="text" name="name" class="form-control" readonly value="{{ $employee->first_name }} {{ $employee->last_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Promotion Date</h5>
                                                <input type="date" name="date" class="form-control" placeholder="Your Password" readonly value="{{ $promotion->promotion_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <h5>Current Designation</h5>
                                                <input type="text" name="previous" class="form-control"  readonly value="{{ $employee->designation->title }}" >
                                                <input type="text" name="previous_designation" class="form-control"  hidden value="{{ $employee->designation_id }}" >
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Promotion Date</th>
                                                    <th>Previous Designation</th>
                                                    <th>Promoted Designation</th>
                                                    <th>Approved By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($promotions)
                                                    @foreach ($promotions as $promotion)
                                                        <tr>
                                                            <td class="text-bold-600" >{{ $promotion->promotion_date }}</td>
                                                            <td>@if ($promotion->previous)
                                                                {{ $promotion->previous->title }}
                                                            @endif</td>
                                                            <td>{{ $promotion->next->title }}</td>
                                                            <td>{{ $promotion->approved->info->first_name }} {{ $promotion->approved->info->last_name }} <br>
                                                                {{ $promotion->approved->info->employee_id }}</td>
                                                        </tr>   
                                                    @endforeach
                                                @else
                                                    {{ 'No Data Found' }}
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Promotion Date</th>
                                                    <th>Previous Designation</th>
                                                    <th>Promoted Designation</th>
                                                    <th>Approved By</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    
    <!-- Basic Inputs end -->

</div>
@endsection

@section('js')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin_template/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin_template/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/components.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/footer.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin_template/app-assets/js/scripts/pages/table-extended.js')}}"></script>
    <!-- END: Page JS-->
@endsection