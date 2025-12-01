@extends('admin.layouts.master')
@section('css_page')
    <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('velonic_admin') }}/assets/js/config.js"></script>
    <style>
        .item {
            transition: all 0.3s ease;
        }
        
        .item.hidden {
            opacity: 0;
            transform: scale(0.9);
            height: 0;
            padding: 0;
            margin: 0;
            overflow: hidden;
        }
    
        #container-card {
            transition: all 0.3s ease;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- Header dan Breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">QR Code</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">QR Code</h4>
                    </div>
                </div>
            </div>

            <!-- Search dan Create Button -->
            <div class="profile-user-box mt-2">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input type="text" id="search-data" class="form-control" placeholder="Search by QR name...">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-primary rounded-start-0">
                                    <i class="ri-search-line fs-16"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Tombol Create QR Code -->
                        <div class="d-flex justify-content-end align-items-center gap-2">
                            <button type="button" class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="ri-add-box-line align-text-bottom me-1 fs-16 lh-1"></i>
                                Create QR Code
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Container untuk QR Codes -->
            <div class="row" id="container-card">
                @foreach ($data_qr as $qr)
                    <div class="col-md-4 item" data-name="{{ strtolower($qr->name) }}">
                        <!-- Card Structure -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="d-flex">
                                        <a class="me-3" href="#">
                                            <img class="avatar-md bx-s" src="{{ asset('img/qr_codes/' . $qr->qr_image) }}" data-bs-toggle="modal" data-bs-target="#qrModal{{ $qr->id }}">
                                        </a>

                                        {{-- QR Code Modal --}}
                                        <div class="modal fade" id="qrModal{{ $qr->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">QR Code - {{ $qr->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <div class="col-12 d-flex justify-content-center">
                                                                <img class="avatar-lg" src="{{ asset('img/qr_codes/' . $qr->qr_image) }}" style="height: 15rem; width: 15rem">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-12 d-flex justify-content-center">
                                                                <p>{{ Str::limit($qr->url) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" id="downloadButtonModal-{{ $qr->id }}" class="btn btn-primary">Download QR</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> {{-- /* QR Code Modal --}}
                                        
                                        <div class="info">
                                            <h5 class="fs-16 my-1">{{ $qr->name }}</h5>
                                            <p class="text-muted fs-12">{{ Str::limit($qr->url, 20) }}</p>
                                        </div>
                                    </div>
                                    <!-- Action Buttons -->
                                    <div style="min-width: 100px;">
                                        <button type="button" id="downloadButton-{{ $qr->id }}" class="btn btn-success btn-sm me-1 tooltips" data-bs-toggle="tooltip" data-bs-placement="top" title="Download QR">
                                            <i class="ri-download-fill"></i>
                                        </button>
                                        <button type="button" id="deleteButton-{{ $qr->id }}" class="btn btn-danger btn-sm me-1 tooltips" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete QR">
                                            <i class="ri-close-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal untuk Create QR Code -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <form class="forms-sample" action="/qr-code" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="name_qr" class="col-sm-3 col-form-label">Name QR</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name_qr" name="name" placeholder="Masukkan Nama QR">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="link" class="col-sm-3 col-form-label">Link</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="link" name="url" placeholder="Masukkan URL/Link">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('js_page')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-data');
            const container = document.getElementById('container-card');
            const items = Array.from(document.querySelectorAll('.item'));
            
            // Fungsi untuk memfilter item
            function filterItems() {
                const searchTerm = searchInput.value.toLowerCase();
                
                items.forEach(item => {
                    const itemName = item.dataset.name.toLowerCase();
                    const matchesSearch = itemName.includes(searchTerm);
                    
                    if (searchTerm === '' || matchesSearch) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            }
            searchInput.addEventListener('input', filterItems);
            
            // Inisialisasi tooltip
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

<!-- Script untuk Download dan Delete -->
@foreach ($data_qr as $qr)
    <script>
        // Download QR Code
        document.getElementById("downloadButton-{{ $qr->id }}").addEventListener("click", function() {
            var imageUrl = "{{ asset('img/qr_codes/' . $qr->qr_image) }}";
            var a = document.createElement('a');
            a.href = imageUrl;
            a.download = 'QR_{{ Str::slug($qr->name) }}.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });

        // Delete QR Code
        document.getElementById("deleteButton-{{ $qr->id }}").addEventListener("click", function() {
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this QR code!",
                icon: "warning",
                showCancelButton: true,
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    fetch("{{ route('qr-code.destroy', $qr->id) }}", {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json",
                            "Content-Type": "application/json"
                        }
                    }).then(response => {
                        if (response.ok) {
                            Swal.fire(
                                'Deleted!',
                                'QR Code has been deleted.',
                                'success'
                            ).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                'Failed to delete QR Code.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
@endforeach

    <script src="{{ asset('velonic_admin') }}/assets/js/vendor.min.js"></script>
    <script src="{{ asset('velonic_admin') }}/assets/js/app.min.js"></script>
@endsection