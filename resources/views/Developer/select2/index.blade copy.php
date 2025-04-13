<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Select with Checkbox</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .list-container {
            width: 300px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }
        .list-item {
            display: flex;
            align-items: center;
            /* padding: 10px; */
            margin: 5px 0;
            background: #f9f9f9;
            cursor: pointer;
            border-radius: 3px;
            transition: 0.2s;
            user-select: none;
        }
        .list-item:hover {
            background: #e0e0e0;
        }
        .list-item input {
            display: none;
        }
        .list-item label {
            width: 100%;
            padding: 20px 20px;
            cursor: pointer;
        }
        /* Ubah warna saat checkbox dipilih */
        .list-item input:checked + label {
            background: #007bff;
            color: white;
            border-radius: 3px;
        }
        /* Styling tombol */
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

    <h2>Pilih Item</h2>

    <!-- Tombol untuk menselect 10 data pertama -->
    <button type="button" class="btn" onclick="selectFirst10()">Pilih 10 Data Pertama</button>

    <form action="{{ url('/save-selection') }}" method="POST">
        @csrf
        <div class="list-container">
            @for ($i = 1; $i <= 100; $i++)
                <div class="list-item">
                    <input type="checkbox" id="item{{ $i }}" name="selectedItems[]" value="{{ $i }}">
                    <label for="item{{ $i }}">Item {{ $i }}</label>
                </div>
            @endfor
        </div>

        <br>
        <button type="submit" class="btn">Simpan Pilihan</button>
    </form>

    <script>
        function selectFirst10() {
            // Ambil semua checkbox dalam form
            let checkboxes = document.querySelectorAll('.list-container input[type="checkbox"]');
            
            // Loop dan select 10 pertama
            checkboxes.forEach((checkbox, index) => {
                checkbox.checked = index < 10; // Select hanya 10 pertama
            });
        }
    </script>

</body>
</html>
