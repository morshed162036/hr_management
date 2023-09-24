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
                <h5 class="content-header-title float-left pr-1 mb-0">Holiday Create</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('branch.index') }}">Holidays</a>
                        </li>
                        <li class="breadcrumb-item active">Holiday Create
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
    <!-- Basic Inputs start -->
    <section id="form-repeater-wrapper">
        <!-- form default repeater -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Holidays
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form repeater-default" action="{{ route('leave-holidays.store') }}" method="post" enctype="multipart/form-data"> @csrf
                                <fieldset class="col-md-6 col-sm-12 mb-4">
                                    <h5>Year</h5>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-Createon1"><i class="bx bx-file"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="year" required>
                                    </div>
                                </fieldset>
                                <div data-repeater-list="group-holiday">
                                    <div data-repeater-item>
                                        <div class="row justify-content-between">
                                            <div class="col-md-2 col-sm-12 form-group">
                                                <label for="title">Title </label>
                                                <input type="title" class="form-control" id="title" name="title" placeholder="Enter title" required>
                                            </div>
                                            <div class="col-md-2 col-sm-12 form-group">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" id="date" name="holiday_date" required>
                                            </div>
                                            <div class="col-md-2 col-sm-12 form-group">
                                                <label for="type">Type</label>
                                                <select id="type" name="holiday_type" class="form-control" required>
                                                    <option value="">Select</option>
                                                    <option value="Govt">Govt</option>
                                                    <option value="Company">Company</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 col-sm-12 form-group">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control" id="description" name="description">
                                            </div>
                                            <div class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2">
                                                <button class="btn btn-danger text-nowrap px-1" data-repeater-delete type="button"> <i class="bx bx-x"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col p-0">
                                        <button class="btn btn-primary" data-repeater-create type="button"><i class="bx bx-plus"></i>
                                            Add Row
                                        </button>
                                        <button class="btn btn-primary" type="submit"><i class="bx bx-check"></i>
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ form default repeater -->
    </section>
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
    <script src="{{ asset('admin_template/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
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
    <script src="{{ asset('admin_template/app-assets/js/scripts/forms/form-repeater.js')}}"></script>
    <!-- END: Page JS-->
@endsection