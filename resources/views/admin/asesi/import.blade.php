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

        /* ============================ Style Group Asesi CRUD Button ============================ */
        .action-cell {
            position: relative;
            width: 180px;
        }
        
        .action-buttons {
            display: flex;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55); 
            overflow: hidden;
            width: 0;
        }
        
        .action-button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
            margin: 0 2px;
            color: #555;
            white-space: nowrap;
        }
        
        .action-button:hover {
            color: #000;
        }
        
        .dots-button {
            background: none;
            cursor: pointer;
            position: absolute;
            right: 50%;
            top: 50%;
            transform: translateY(-50%);
        }
        
        tr:hover .dots-button {
            opacity: 0;
            width: 0;
        }
        
        tr:hover .action-buttons {
            opacity: 1;
            width: 150px;
        }

        .deleteButton {
            pointer-events: auto; /* Pastikan ini ada */
        }

        .deleteButton i {
            pointer-events: none; /* Biarkan event click ditangkap oleh parent */
        }
            
    </style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">

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

        <!-- import excel -->
        <div class="row">
            <form action="{{ route('asesiAdded') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="header-title">Import Data Asesi from Excel</h4>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <a href="{{ asset('template_surat/template_excel_import_asesi.xlsx') }}" class="btn btn-sm btn-dark ml-2">
                                    <i class="ri-download-line"></i> Download Template Excel
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label">Nama Group Asesi</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                    <input type="text" class="form-control" placeholder="Inputkan Nama Group Data Asesi" name="nama_group_asesi">
                                </div>

                                @error('nama_group_asesi')
                                    <style> .border-red{border-color: #d03f3f} </style>

                                    <div class="invalid-tooltip d-block position-static mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Upload File Excel</label>
                                    <input type="file" name="file" id="file" class="form-control" required>
                                    @error('file')
                                        <style> .border-red{border-color: #d03f3f} </style>

                                        <div class="invalid-tooltip d-block position-static mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mt-2 d-block">Import Data</button>
                        </div>
                    </div>
            </form>
        </div>
        <!-- /. import excel -->

        @if (empty($countDataError))
            <!-- list asesi group -->
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('asesiAdded') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="header-title">Group Asesi</h4>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-end">
                                        <a class="btn btn-sm btn-success" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#add.modalSkema"><i class="ri-add-fill"></i> Tambah Data Skema</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="scroll-horizontal-datatable" class="table table-bordered w-100 nowrap">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Group</th>
                                            <th>Jumlah Asesi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asesiGroup as $group)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $group->nama_group_asesi }}</td>
                                            <td><h3 class="d-inline">{{ $group->asesi_count }}</h3> Orang</td>
                                            <td class="action-cell">
                                                <div class="action-buttons">

                                                    <a href="/asesi?id_group={{ $group->id }}" style="padding:10px; margin-left:5px" class="badge bg-success"><i class="ri-eye-fill"></i></a>
                                                    <a href="#" style="padding:10px; margin-left:5px" class="badge bg-warning"><i class="ri-edit-fill"></i></a>

                                                    {{-- Delete Button --}}
                                                    <input type="hidden" name="id_group" value="{{ $group->id }}">
                                                    <a style="padding:10px; margin-left:5px" type="submit" class="badge bg-danger download-btn-hover deleteButton" data-nama="{{ $group->nama_group_asesi }}"><i class="ri-delete-bin-fill"></i></a>
                                                </div>
                                                
                                                <span class="dots-button"><i class="ri-menu-line"></i></span>

                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                    </form>
                </div>
            </div>
            <!-- /. list asesi group -->
        @endif



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
                                @include('admin.asesi.table-error.table-data-error')
                            @elseif($status == 'duplicate')
                                @include('admin.asesi.table-error.table-data-duplicate')
                           @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

{{-- Add Modal Group Asesi --}}
<form enctype="multipart/form-data" method="POST" action="{{ route('groupAsesiStore') }}">
    @csrf
    <div class="modal fade" id="add.modalSkema" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="info-header-modalLabel">Tambah Group Asesi</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Modal Content --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="nama_skema">Nama Group<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="ri-newspaper-fill"></i> </div>
                                    <input type="text" class="form-control" placeholder="Inputkan Nama Group Asesi" name="nama_group">
                                </div>

                                @error('nama_group')
                                    <div style="color: #ff7076; font-size: 13px">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tambah Group Asesi</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- /* End Add Modal Group Asesi --}}

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


     {{-- Sweet Alert Delete --}}
    <script>
        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("deleteButton")) {
                const groupID = event.target.closest("tr").querySelector('input[name="id_group"]').value;
                const namaGroup = event.target.getAttribute("data-nama");

                Swal.fire({
                    title: "Are you sure?",
                    text: "Apakah Anda ingin menghapus data " + namaGroup + " ?",
                    icon: "warning",
                    showCancelButton: true,
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        const url = `/asesiGroupDeleted/${groupID}`;
                        fetch(url, {

                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire(
                                    'Terhapus',
                                    'Data Berhasil Dihapus',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }

                                });
                            } else {
                                Swal.fire({
                                    title: "Error",
                                    text: "Gagal menghapus data.",
                                    icon: "error",
                                });
                            }
                        }).catch(err => {
                            Swal.fire({
                                title: "Error",
                                text: "Terjadi kesalahan pada server.",
                                icon: "error",
                            });
                        });
                    } else {
                        Swal.fire({
                            title: "Dibatalkan",
                            text: "Data batal dihapus.",
                            icon: "error",
                        });
                    }
                });
            }
        });
    </script>
    {{-- /* End Sweet Alert Delete--}}



@endsection
