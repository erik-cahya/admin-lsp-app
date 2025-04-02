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

    <!-- App css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <style>
        .hover-menu{
            display: none;
        }

        .hoverMenuContainer:hover .hover-menu{
            cursor: pointer;
            display: block;
        }

        .download-btn-hover:hover{
            background-color: #495057!important;
            transition: 0.3s;
        }
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
                            <li class="breadcrumb-item active">{{ $titlePage }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ $titlePage }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">{{ $titlePage }}</h4>
                        <p class="text-muted mb-0">
                            Anda bisa menambahkan dan mendownload {{ $titlePage }}, foto, serta tanda tangan.
                        </p>
                        <a href="{{ route('surat-permohonan-blanko.create') }}" class="btn btn-sm btn-dark mt-2">Buat Surat</a>
                    </div>
                    <div class="card-body">
                        <table id="scroll-horizontal-datatable" class="table table-bordered w-100 nowrap" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Surat</th>
                                    <th>Jumlah Peserta Asesi</th>
                                    <th>Tanggal Surat</th>
                                    <th>Download Surat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_surat as $data)
                                    
                                <tr class="hoverMenuContainer">
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="badge bg-success rounded-pill">{{ $data->nomor_surat }}</span></td>
                                    <td>{{ $data->asesi_count }} Orang</td>
                                    <td>{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $data->tanggal_surat)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                    {{-- <td><button type="button" class="btn btn-xs btn-light"><i class="ri-hearts-fill me-1"></i> <span>Like</span> </button></td> --}}
                                    <td><a href="{{ route('surat-permohonan-blanko.generatePdf', $data->id) }}" class="badge bg-dark px-2 download-btn-hover"><i class="ri-download-2-fill me-1"></i>  Download PDF</a></td>
                                    <td>
                                        Edit |

                                        {{-- Delete Button using SweetAlert --}}
                                        <form action="" method="POST" class="d-inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <input type="hidden" name="id_surat_permohonan" value="{{ $data->id }}">
                                            <span type="button" class="text-danger deleteButton" data-nomor="{{ $data->nomor_surat }}">Delete</span>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>

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

     {{-- Sweet Alert --}}
    <script>
        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("deleteButton")) {
                const asesId = event.target.closest("tr").querySelector('input[name="id_surat_permohonan"]').value;
                const nomorSurat = event.target.getAttribute("data-nomor");

                Swal.fire({
                    title: "Are you sure?",
                    text: "Apakah Anda ingin menghapus surat permohonan " + nomorSurat + " ?",
                    icon: "warning",
                    showCancelButton: true,
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        const url = `/suratPermohonanBlanko/destroy/${asesId}`;
                        fetch(url, {

                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire(
                                    'Terhapus',
                                    'Surat Permohonan Berhasil Dihapus',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                        // console.log("URL Fetch:", "{{ route('surat-permohonan-blanko.delete'," . asesId . ") }}");

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
                            text: "Surat Permohonan Batal Dihapus.",
                            icon: "error",
                        });
                    }
                });
            }
        });
    </script>
    {{-- /* End Sweet Alert --}}

@endsection
