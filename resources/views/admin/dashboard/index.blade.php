@extends('admin.layouts.master')
@section('css_page')
    <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('velonic_admin') }}/assets/js/config.js"></script>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">LSP Engineering Hospitality Indonesia</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Welcome {{ Auth::user()->name }} !</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-pink">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-eye-line widget-icon"></i>
                        </div>
                        <span class="badge bg-pink-subtle rounded-1 text-pink text-uppercase fs-12 fw-semibold px-2 py-1 ">Jumlah Asesor</span>

                        <h3 class="my-2">{{ $countAsesor }} <span class="text-uppercase fs-14 ">/ Orang</span></h3>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-purple">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-wallet-2-line widget-icon"></i>
                        </div>
                        <span class="badge bg-purple-subtle rounded-1 text-purple text-uppercase fs-12 fw-semibold px-2 py-1 ">Jumlah TUK</span>

                        <h3 class="my-2">{{ $countTUK }} <span class="text-uppercase fs-14 ">/ TUK</span></h3>
                    </div>
                </div>
            </div> 

            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-info">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-shopping-basket-line widget-icon"></i>
                        </div>
                        <span class="badge bg-info-subtle rounded-1 text-info text-uppercase fs-12 fw-semibold px-2 py-1 ">Jumlah Skema</span>

                        <h3 class="my-2">{{ $countSkema }} <span class="text-uppercase fs-14 ">/ Skema</span></h3>
                    </div>
                </div>
            </div> 

            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-primary">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-group-2-line widget-icon"></i>
                        </div>
                        <span class="badge bg-primary-subtle rounded-1 text-primary text-uppercase fs-12 fw-semibold px-2 py-1 ">Jumlah Asesi</span>

                        <h3 class="my-2">{{ $countAsesi }} <span class="text-uppercase fs-14 ">/ Orang</span></h3>
                    </div>
                </div>
            </div> 
        </div>
    </div>

</div>
@endsection
@section('js_page')
     <script src="{{ asset('velonic_admin') }}/assets/js/vendor.min.js"></script>
     <script src="{{ asset('velonic_admin') }}/assets/js/app.min.js"></script>
@endsection
