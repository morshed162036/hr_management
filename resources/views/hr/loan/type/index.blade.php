@extends('layout.main')

@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
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
    <style>
        a label{
            cursor: pointer;
        }
    </style> 
@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success: </strong>{{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                    @endif
                    <h5 class="content-header-title float-left pr-1 mb-0">Loan Table</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Loans
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Loan List</h5>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li class="ml-2"><a href="{{ route('loan.create') }}" class="btn btn-primary">+ Create</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($loans)
                                                @foreach ($loans as $loan)
                                                    <tr>
                                                        <td class="text-bold-600" >{{ $loan->title }}</td>
                                                        <td>{{ $loan->description }}</td>
                                                        <td>
                                                            @if($loan->status == 'Active')
                                                                <a class="updateLoanStatus" id="loan-{{ $loan->id }}"
                                                                    loan_id = "{{ $loan->id }}"
                                                                    href="javascript:void(0)">
                                                                        <label class="badge badge-success" status="Active">Active</label>
                                                                </a>
                                                            @else
                                                                <a class="updateLoanStatus" id="loan-{{ $loan->id }}"
                                                                    loan_id = "{{ $loan->id }}"
                                                                    href="javascript:void(0)">
                                                                        <label class="badge badge-danger" status="Inactive">Inactive</label>
                                                                </a>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <div class="dropdown">
                                                                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="{{ route('loan.edit',$loan->id) }}"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                                                    <form action="{{ route('loan.destroy',$loan->id) }}" method="post"> @csrf @method('Delete')
                                                                        <button type="submit" class="dropdown-item"><i class="bx bx-trash mr-1"></i> delete</button>
                                                                    </form>
                                                                    
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>   
                                                @endforeach
                                            @else
                                                {{ 'No Data Found' }}
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('js')

    
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin_template/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin_template/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/footer.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin_template/app-assets/js/scripts/datatables/datatable.js') }}"></script>
    <!-- END: Page JS-->
    <script>

        $(document).ready(function (){
            $(document).on("click", ".updateLoanStatus", function () {
                var status = $(this).children("label").attr("status");
                var loan_id = $(this).attr("loan_id");

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    type: "post",
                    url: "{{ route('updateLoanStatus') }}",
                    data: { status: status, loan_id: loan_id },
                    success: function (resp) {
                        if (resp["status"] == 'Inactive') {
                            $("#loan-" + loan_id).html(
                                "<label class='badge badge-danger' status='Inactive'>Inactive</label>"
                            );
                        } else if (resp["status"] == 'Active') {
                            $("#loan-" + loan_id).html(
                                "<label class='badge badge-success' status='Active'>Active</label>"
                            );
                        }
                    },
                    error: function () {
                        alert("Error");
                    },
                });
            });
        })
        
    </script>
@endsection

