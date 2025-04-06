@extends('admin.layouts.master')
@section('css_page')
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('velonic_admin') }}/assets/images/favicon.ico">

    <!-- Select2 css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Daterangepicker css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Touchspin css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Datepicker css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Timepicker css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />

    <!-- Flatpickr Timepicker css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ asset('velonic_admin') }}/assets/js/config.js"></script>

    <!-- App css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div class="content">
    <div class="container-fluid">
        <form enctype="multipart/form-data" method="POST" action="{{ route('surat-permohonan-blanko.store') }}">
            @csrf
               <!-- start page title -->
               <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin LSP EH</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Surat</a></li>
                                <li class="breadcrumb-item active">{{ $titlePage }}</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Create {{ $titlePage }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Form {{ $titlePage }}</h4>
                                    <p class="text-muted mb-0">
                                        Inputkan data yang diperlukan untuk {{ $titlePage }} pada form dibawah </code>
                                    </p>
                                    <a href="{{ route('surat-permohonan-blanko.view') }}" class="btn btn-sm btn-dark mt-2">List Surat Permohonan</a>

                                </div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Nomor Surat<span class="text-danger">*</span></label>
                                                
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                                    <input type="text" class="form-control " id="nomor_surat" oninput="capitalizeText()" name="nomor_surat" value="{{ old('nomor_surat') }}">
                                                </div>
                                                @error('nomor_surat')
                                                    <style> .form-control{border-color: #d03f3f} </style>

                                                    <div class="invalid-tooltip d-block position-static mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Tanggal Surat<span class="text-danger">*</span></label>

                                                <div class="position-relative input-group" id="tanggalUji">
                                                    <div class="input-group-text"><i class="ri-calendar-fill"></i> </div>
                                                    <input type="text" class="form-control" placeholder="Select Date" data-provide="datepicker" data-date-format="dd-MM-yyyy" name="tanggal_surat" data-date-container="#tanggalUji" autocomplete="off" required value="{{ old('tanggal_surat') }}">
                                                </div>
                                                @error('tanggal_uji')
                                                    <style> .form-control{border-color: #d03f3f} </style>

                                                    <div class="invalid-tooltip d-block position-static mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Kompeten Anggaran BNSP<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                                    <input type="number" class="form-control" placeholder="Inputkan Jumlah Kompeten Anggaran BNSP" name="kompeten_anggaran_bnsp">
                                                </div>

                                                @error('kompeten_anggaran_bnsp')
                                                    <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Kompeten Anggaran Kementrian<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                                    <input type="number" class="form-control" placeholder="Inputkan Jumlah Kompeten Anggaran Kementrian" name="kompeten_anggaran_kementrian">
                                                </div>

                                                @error('kompeten_anggaran_kementrian')
                                                    <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Kompeten Anggaran Mandiri<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                                    <input type="number" class="form-control" placeholder="Inputkan Jumlah Kompeten Anggaran Mandiri" name="kompeten_anggaran_mandiri">
                                                </div>

                                                @error('kompeten_anggaran_mandiri')
                                                    <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Kompeten Anggaran RCC<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                                    <input type="number" class="form-control" placeholder="Inputkan Jumlah Kompeten Anggaran RCC" name="kompeten_rcc">
                                                </div>

                                                @error('kompeten_rcc')
                                                    <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Belum Kompeten<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                                    <input type="number" class="form-control" placeholder="Inputkan Jumlah Belum Kompeten" name="belum_kompeten">
                                                </div>

                                                @error('belum_kompeten')
                                                    <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="justify-content-start row">
                                            <div class="col-3">
                                                <button type="submit" class="btn btn-info">Buat Surat Permohonan</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>

                <!-- [ Main Content ] end -->

        </form>
    </div>
</div>
@endsection
@section('js_page')


    <script>
        function capitalizeText() {
            var input = document.getElementById("nomor_surat");
            input.value = input.value.toUpperCase();
        }
    </script>

    <!-- Vendor js -->
    <script src="{{ asset('velonic_admin') }}/assets/js/vendor.min.js"></script>
    <!-- Bootstrap Datepicker Plugin js -->
    <script src="{{ asset('velonic_admin') }}/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- App js -->
    <script src="{{ asset('velonic_admin') }}/assets/js/app.min.js"></script>
@endsection
