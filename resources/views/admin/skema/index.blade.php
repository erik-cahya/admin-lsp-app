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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data LSP</a></li>
                            <li class="breadcrumb-item active">{{ $titlePage }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ $titlePage }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-8">
                <!-- Todo-->
                <div class="card">
                    <div class="card-body p-0">
                        <div class="p-3">
                            
                            <h5 class="header-title mb-0">{{ $titlePage }}</h5>
                        </div>

                        <div id="yearly-sales-collapse" class="collapse show">

                            <div class="table-responsive">
                                <table class="table table-nowrap table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Skema</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- <tr>
                                           <td>1</td>
                                           <td>Velonic Admin v1</td>
                                           <td>01/01/2015</td>
                                           <td>26/04/2015</td>
                                           <td><span class="badge bg-info-subtle text-info">Released</span></td>
                                           <td>Techzaa Studio</td>
                                       </tr> --}}
                                         @foreach ($dataSkema as $skema)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $skema->nama_skema }}</td>
                                            <td>
                                                <div class="btn-group mb-2">
                                                    {{-- Edit Button --}}
                                                    {{-- <a href="/skema/{{ $skema->id }}/edit" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" data-bs-title="Edit">
                                                        <i class="ri-edit-line"></i>
                                                    </a> --}}

                                                    {{-- See Details --}}
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalSurat{{ $skema->id }}">
                                                    <i class="ri-edit-line"></i> 
                                                </button>

                                                    {{-- Delete Button --}}
                                                    <form action="/skema/{{ $skema->id }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <input type="hidden" name="id_surat" value="{{ $skema->id }}">
                                                        <button type="button" id="deleteButton-{{ $skema->id }}" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" class="tooltips" data-bs-title="Delete">
                                                            <i class="ri-delete-bin-2-line"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                         @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
    </div>
</div>


{{-- Modal --}}
@foreach ($dataSkema as $skema)
 <form enctype="multipart/form-data" method="POST" action="{{ route('skema.update', $skema->id) }}">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modalSurat{{ $skema->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="info-header-modalLabel">{{ $titlePage }} EHI</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Modal Content --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Nama Skema</label>
                                <input class="form-control" type="text" value="{{ $skema->nama_skema }}" name="nama_skema">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update Data</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
 </form>
@endforeach
<!-- /* End Modal -->

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
    <script src="{{ asset('velonic_admin') }}/assets/js/pages/datatable.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('velonic_admin') }}/assets/js/app.min.js"></script>

    {{-- Sweet Alert --}}
    <script>
        @foreach ($dataSkema as $skema)
            document.getElementById("deleteButton-{{ $skema->id }}").addEventListener("click", function() {

            Swal.fire({
                    title: "Are you sure?",
                    text: "Apakah anda yakin ingin mengapus Skema ?",
                    icon: "warning",
                    showCancelButton: true,
            }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        fetch("{{ route('skema.destroy', $skema->id) }}", {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                            Swal.fire(
                                'Terhapus',
                                'Data Skema Berhasil Dihapus',
                                'success'
                            ).then((result) =>{
                                if (result.isConfirmed){
                                window.location.href = "{{ route('skema.index') }}";
                                }
                            })
                            }
                        })
                    } else {
                    Swal.fire({
                        title: "Dibatalkan",
                        text: "Data Skema Batal Dihapus",
                        icon: "error",});
                    }
                });
            });
        @endforeach
    </script>
    {{-- /* End Sweet Alert --}}
@endsection