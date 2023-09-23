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
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/plugins/forms/wizard.css') }}">
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
                <h5 class="content-header-title float-left pr-1 mb-0"> New Employee</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('employee-list.index') }}">Employees</a>
                        </li>
                        <li class="breadcrumb-item active">Employee Create
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
    <section id="info-tabs-">
        <div class="row">
            <div class="col-12">
                <div class="card icon-tab">
                    <div class="card-header">
                        <h4 class="card-title">Employee Details Tab</h4>
                    </div>
                    <div class="card-content mt-2">
                        <div class="card-body">
                            <form action="#" class="wizard-validation">
                                <!-- Step 1 -->
                                <h6>
                                    <i class="step-icon"></i>
                                    <span>Basic Details</span>
                                </h6>
                                <!-- Step 1 end-->
                                <!-- body content of step 1 -->
                                <fieldset>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="py-50">Basic Details</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Employee Id</label>
                                                <input type="text" class="form-control required" placeholder="Enter Your First name" name="employee_id">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>FIRST Name</label>
                                                <input type="text" class="form-control required" placeholder="Enter Your First name" name="first_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control required" placeholder="Enter Your Last name" name="last_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" class="form-control required" placeholder="Enter Your User name" name="user_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control required" placeholder="Enter Your Email" name="email">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>password</label>
                                                <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <fieldset>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="customRadio" id="customRadio1" checked>
                                                                <label class="custom-control-label" for="customRadio1">Male</label>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <fieldset>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="customRadio" id="customRadio2">
                                                                <label class="custom-control-label" for="customRadio2">Female</label>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Profile Picture</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="py-50">Contact Details</h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Address Line 1</label>
                                                <input type="text" class="form-control" placeholder="Enter Your House no./ Flate no." name="address_1">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>address line 2</label>
                                                <input type="text" class="form-control required" placeholder="Enter Your Society name / Area name" name="address_2">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>city</label>
                                                <input type="text" class="form-control required" placeholder="Enter Your Ciy" name="city">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control required" placeholder="Enter Your State" name="state">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control required" placeholder="Enter Your Country" name="country">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-md-">
                                                <div class="form-group">
                                                    <label>Pin Code</label>
                                                    <input type="text" class="form-control" placeholder="Enter Pin Code" name="pincode">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="text" class="form-control" placeholder="Enter Your Current Age">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="number" class="form-control required" placeholder="+12345675" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ALt-Phone</label>
                                                <input type="number" class="form-control" placeholder="+12345675" name="alt_phone">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>NID</label>
                                                <input type="text" class="form-control required" name="nid" placeholder="Enter NID Number">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="d-block">Gender</label>
                                                <div class="custom-control-inline">
                                                    <div class="radio mr-1">
                                                        <input type="radio" name="bsradio1" id="radio5" checked="">
                                                        <label for="radio5">Male</label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" name="bsradio1" id="radio888" checked="">
                                                        <label for="radio888">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="py-50">Office Info</h6>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Wing</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Branch</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Section</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Grade</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Reporting To</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Join Date</label>
                                                <input type="date" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Resign Date</label>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Employee Type</label>
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <fieldset>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="employee_type" id="customRadio11" checked>
                                                                <label class="custom-control-label" for="customRadio11">Probation</label>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <fieldset>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="employee_type" id="customRadio21">
                                                                <label class="custom-control-label" for="customRadio21">Permanent</label>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <fieldset>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="employee_type" id="customRadio31">
                                                                <label class="custom-control-label" for="customRadio31">Master Roll</label>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <fieldset>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="employee_type" id="customRadio41">
                                                                <label class="custom-control-label" for="customRadio41">Contractual</label>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>PF & Gratuity Eligiblity</label>
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <fieldset>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="pf&gratuity_eligiblity" id="customRadio12" checked>
                                                                <label class="custom-control-label" for="customRadio12">Yes</label>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <fieldset>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="pf&gratuity_eligiblity" id="customRadio22">
                                                                <label class="custom-control-label" for="customRadio22">No</label>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Document</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile011">
                                                    <label class="custom-file-label" for="inputGroupFile011">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- body content of step 1 end-->
                                <!-- Step 2-->
                                <h6>
                                    <i class="step-icon"></i>
                                    <span class="fonticon-wrap">
                                        <i class="livicon-evo" data-options="name:briefcase.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                                    </span>
                                    <span>Term and conditions</span>
                                </h6>
                                <!-- Step 2 end-->
                                <!-- body content of step 2 -->
                                <fieldset>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="py-50">Terms and conditions</h6>
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum culpa repellendus laborum maxime
                                                dignissimos dolor excepturi iusto nemo aspernatur? Qui modi inventore reprehenderit, nostrum
                                                quaerat libero maiores consequuntur illo veritatis.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, culpa obcaecati. Qui accusantium
                                                sit error, dolorem alias incidunt est. Laborum, atque ipsum debitis obcaecati dolor illo magni
                                                provident harum vitae?
                                            </p>
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit omnis, doloribus autem,
                                                non quam quibusdam harum accusamus voluptatem in perspiciatis consequuntur sint nam debitis
                                                sapiente ex, optio totam delectus quis.
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis placeat in quisquam dolorum
                                                numquam, rerum expedita corporis eveniet quas nostrum, quia veritatis neque quos sint sit
                                                exercitationem obcaecati perferendis magnam!
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam consequatur laudantium
                                                voluptatibus impedit unde. Error eius consequuntur tenetur unde molestias esse doloribus animi,
                                                temporibus placeat eaque laborum, maiores, ex quo!
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, suscipit placeat accusamus
                                                voluptas odio est ea accusantium dignissimos et officia, cupiditate aperiam atque facilis?
                                                Adipisci earum fuga illo odit reiciendis. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Asperiores nihil necessitatibus sequi placeat tenetur, perspiciatis, excepturi dolor, consectetur
                                                assumenda amet accusantium velit fuga numquam tempore repellendus voluptatem vitae. Voluptatem,
                                                hic.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde perspiciatis vero, reprehenderit
                                                beatae necessitatibus dignissimos animi distinctio illo porro fuga maxime nemo voluptate
                                                aspernatur tempore? Incidunt consectetur dignissimos blanditiis. Corporis. Lorem ipsum dolor sit
                                                amet consectetur, adipisicing elit. At, dolore omnis! Architecto dolorem non, earum pariatur,
                                                molestias voluptatem saepe voluptatibus praesentium expedita cum quae et assumenda. Voluptas
                                                debitis praesentium quis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque veniam
                                                ipsa saepe sint necessitatibus incidunt nihil totam delectus, dolor omnis itaque libero sed
                                                molestiae assumenda non repellat, rerum, eius quia. lorem
                                            </p>
                                            <strong>Read all term and conditions carefully.</strong>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="radio">
                                                    <input type="radio" name="bsradio" id="agree">
                                                    <label for="agree" class="text-success">I read all term and conditions and i Agree.</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="bsradio" id="disagree">
                                                    <label for="disagree" class="text-danger">I am not Agree with it.</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- body content of step 2 end-->
                                <!-- Step 3-->
                                <h6>
                                    <i class="step-icon"></i>
                                    <span class="fonticon-wrap">
                                        <i class="livicon-evo" data-options="name:users.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                                    </span>
                                    <span>Nominee</span>
                                </h6>
                                <!-- Step 3 end-->
                                <!-- body content of step 3 -->
                                <fieldset>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="py-50">Enter Nominate Details</h6>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa ad, consectetur animi magni
                                                    magnam nihil error, quaerat pariatur dolores unde quod sequi modi temporibus libero eos
                                                    consequuntur ab maxime alias!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label>Nomination Name</label>
                                                <input type="text" class="form-control" placeholder="Nomination Name">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <div class="form-group">
                                                <label>Nominee's Relation</label>
                                                <input type="text" class="form-control" placeholder="Relation">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <div class="form-group">
                                                <label>Nominee Age</label>
                                                <input type="number" class="form-control" placeholder="Age">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <div class="form-group">
                                                <label>Nominee Documents</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile05">
                                                    <label class="custom-file-label" for="inputGroupFile05">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="py-50">Terms and conditions for nominee</h6>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci odit sunt facilis,
                                                exercitationem placeat in maiores, ullam doloribus aperiam sint culpa, quo ducimus tempore
                                                perferendis ipsum laborum officia ut dignissimos!
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. In beatae quibusdam enim neque animi
                                                fugiat harum tempora ipsum excepturi, cupiditate illum hic dignissimos, quaerat dolore! Minus rem
                                                sed accusamus corrupti?
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. In beatae quibusdam enim neque animi
                                                fugiat harum tempora ipsum excepturi, cupiditate illum hic dignissimos, quaerat dolore! Minus rem
                                                sed accusamus corrupti?
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci odit sunt
                                                facilis,
                                                exercitationem placeat in maiores, ullam doloribus aperiam sint culpa, quo ducimus tempore
                                                perferendis ipsum laborum officia ut dignissimos!
                                            </p>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- body content of step 3 end-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="{{ asset('admin_template/app-assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin_template/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/components.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/footer.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin_template/app-assets/js/scripts/forms/wizard-steps.js')}}"></script>
    <!-- END: Page JS-->
@endsection