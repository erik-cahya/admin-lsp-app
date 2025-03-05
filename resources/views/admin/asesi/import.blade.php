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
            <form action="{{ route('asesiAdded') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                        <div class="col-lg-6">
                            <label class="form-label">Surat Permohonan Pengajuan Blanko</label>
                            <select class="form-select form-control select2" data-toggle="select2" data-select2-selector="visibility" id="nama_asesor" name="nama_asesor" >
                                <option selected readonly disabled>Pilih Nomor Surat Pengajuan...</option>
                                <option value="Badung">20/ST-LSP-EHI/2024</option>
                                <option value="Badung">22/ST-LSP-EHI/2024</option>
                                <option value="Badung">56/ST-LSP-EHI/2024</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Upload File Excel</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-2 d-block">Import Data</button>
                    </div>
                    </div>        
            </form>
        </div>


        @if (isset($countDataError) && isset($dataError))
        <div class="row">

            <div class="col-12">
                <div class="card" style="font-size: 12px">
                    <div class="card-header">
                        <h4 class="header-title">{{ $status == 'duplicate' ? 'Data Duplicate' : 'Data Error' }} <span class="noti-icon-badge badge {{ $status == 'duplicate' ? 'text-bg-warning' : 'text-bg-pink' }}">{{ $countDataError }}</span></h4>
                        <p class="text-muted mb-0">
                            Anda bisa menambahkan dan mendownload, foto, serta tanda tangan.
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                           @if ($status == 'error')
                                @include('admin.asesi.error.table-data-error')
                            @elseif($status == 'duplicate')
                                @include('admin.asesi.error.table-data-duplicate')
                           @endif
                        </div>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->
        @endif
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
