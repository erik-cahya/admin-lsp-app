<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Datatables css -->
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('velonic_admin') }}/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    {{-- <script src="{{ asset('velonic_admin') }}/assets/js/config.js"></script> --}}

    <!-- Select2 css -->
    {{-- <link href="{{ asset('velonic_admin') }}/assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" /> --}}


    <!-- App css -->
    {{-- <link href="{{ asset('velonic_admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" /> --}}

    <!-- Icons css -->
    <link href="{{ asset('velonic_admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        .hover-menu{
            display: none;
            }

        .hoverMenuContainer:hover > .hover-menu{
            display: block;
        }
    </style>


</head>
<body>
    <div class="container mt-4">
        <button id="selectTen" class="btn btn-primary mb-3">Select 10</button>
        
        {{-- <table class="table table-bordered"> --}}
        <table id="scroll-horizontal-datatable" class="table table-bordered w-100 nowrap" style="font-size: 12px">

            <thead>
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>NIK</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Data akan diisi melalui JavaScript -->
                @foreach ($asesi as $dtAsesi)
                    <tr>
                        <td><input type="checkbox" class="row-checkbox"> {{ $loop->iteration }}</td>
                        <td>{{ $dtAsesi->nama_lengkap }}</td>
                        <td>{{ $dtAsesi->nik }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tableBody = document.getElementById("tableBody");
            const selectTenButton = document.getElementById("selectTen");
                        
            // Select first 10 checkboxes
            selectTenButton.addEventListener("click", function() {
                const checkboxes = document.querySelectorAll(".row-checkbox");
                checkboxes.forEach((checkbox, index) => {
                    checkbox.checked = index < 10;
                });
            });
        });
    </script>
</body>
</html>
