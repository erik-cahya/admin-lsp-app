<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Checkbox Selection</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .selected {
            background-color: #007bff !important;
            color: white;
        }
        .btn {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>DataTables with Checkbox Selection</h2>

    <!-- Tombol untuk menselect 10 data pertama -->
    <button type="button" class="btn" onclick="selectFirst10()">Pilih 10 Data Pertama</button>

    <form action="{{ url('/save-selection') }}" method="POST">
        @csrf
        <table id="example" class="display">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>ID</th>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                        <td>
                            <input type="checkbox" name="selectedItems[]" value="{{ $i }}" class="row-checkbox">
                        </td>
                        <td>{{ $i }}</td>
                        <td>Item {{ $i }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <br>
        <button type="submit" class="btn">Simpan Pilihan</button>
    </form>
</div>

<!-- DataTables JS -->
{{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}
<!-- Tambahkan jQuery sebelum DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


<script>
    // Inisialisasi DataTable
    document.addEventListener("DOMContentLoaded", function () {
        let table = new DataTable("#example");

        // Tambahkan event listener untuk setiap checkbox
        document.querySelectorAll(".row-checkbox").forEach(function (checkbox) {
            checkbox.addEventListener("change", function () {
                let row = this.closest("tr");
                if (this.checked) {
                    row.classList.add("selected");
                } else {
                    row.classList.remove("selected");
                }
            });
        });
    });

    // Fungsi untuk memilih 10 data pertama
    function selectFirst10() {
        let checkboxes = document.querySelectorAll(".row-checkbox");
        checkboxes.forEach((checkbox, index) => {
            checkbox.checked = index < 10; // Select hanya 10 pertama
            let row = checkbox.closest("tr");
            if (checkbox.checked) {
                row.classList.add("selected");
            } else {
                row.classList.remove("selected");
            }
        });
    }
</script>

</body>
</html>
