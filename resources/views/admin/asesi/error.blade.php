@extends('admin.layouts.master')
@section('css_page')
    <!-- Datatables css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ asset('velonic_admin') }}/assets/js/config.js"></script>

    <!-- Select2 css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />


    <!-- App css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        .hover-menu{
            display: none;
        }

        .hoverMenuContainer:hover > .hover-menu{
            display: block;
        }

        /* .hover-menu-container:hover + .hover-menu{
            display: block;
            background-color: blue;
        } */
    </style>
@endsection

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Data Error</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Error </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <label class="form-label">Judul Skema Data</label>
                        <select class="form-select form-control select2" data-toggle="select2" data-select2-selector="visibility" id="nama_asesor" name="nama_asesor" >
                            <option data-icon="feather-user" selected readonly disabled>Pilih Data Skema...</option>
                                <option data-icon="feather-user" value="Badung">PEMKAB BADUNG 2024 | 300</option>
                                <option data-icon="feather-user" value="Badung">PEMKAB BADUNG 2023 | 156</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Search Data</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Data Error <span class="noti-icon-badge badge text-bg-pink">{{ $countDataError }}</span></h4>
                        <p class="text-muted mb-0">
                            Anda bisa menambahkan dan mendownload, foto, serta tanda tangan.
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered border-primary table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Account No.</th>
                                        <th>Balance</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-user">
                                            <img src="assets/images/users/avatar-6.jpg" alt="table-user" class="me-2 rounded-circle">
                                            Risa D. Pearson
                                        </td>
                                        <td>AC336 508 2157</td>
                                        <td>July 24, 1950</td>
                                        <td class="text-center">
                                            <a href="javascript: void(0);" class="text-reset fs-16 px-1"> <i class="ri-delete-bin-2-line"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-user">
                                            <img src="assets/images/users/avatar-7.jpg" alt="table-user" class="me-2 rounded-circle">
                                            Ann C. Thompson
                                        </td>
                                        <td>SB646 473 2057</td>
                                        <td>January 25, 1959</td>
                                        <td class="text-center">
                                            <a href="javascript: void(0);" class="text-reset fs-16 px-1"> <i class="ri-delete-bin-2-line"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-user">
                                            <img src="assets/images/users/avatar-8.jpg" alt="table-user" class="me-2 rounded-circle">
                                            Paul J. Friend
                                        </td>
                                        <td>DL281 308 0793</td>
                                        <td>September 1, 1939</td>
                                        <td class="text-center">
                                            <a href="javascript: void(0);" class="text-reset fs-16 px-1"> <i class="ri-delete-bin-2-line"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-user">
                                            <img src="assets/images/users/avatar-9.jpg" alt="table-user" class="me-2 rounded-circle">
                                            Sean C. Nguyen
                                        </td>
                                        <td>CA269 714 6825</td>
                                        <td>February 5, 1994</td>
                                        <td class="text-center">
                                            <a href="javascript: void(0);" class="text-reset fs-16 px-1"> <i class="ri-delete-bin-2-line"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->

    </div>
    <!-- container -->

</div>

@endsection
@section('js_page')
     <!-- Vendor js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/vendor.min.js"></script>

     <!--  Select2 Plugin Js -->
    <script src="{{ asset('velonic_admin') }}/assets/vendor/select2/js/select2.min.js"></script>

     <!-- Datatables js -->
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

     <!-- Datatable Demo Aapp js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/pages/datatable.js"></script>

     <!-- App js -->
     <script src="{{ asset('velonic_admin') }}/assets/js/app.js"></script>

   

@endsection
