<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Document</title>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            padding: 0px 0px 0px 20px;
        }

        .center {
            position: relative;
            text-align: center;
        }

        p {

            padding-top: 10px;
        }

        .signature_area p {
            padding-top: 0px;
        }

        .signature_area {
            float: right;
        }

        .signature_area img {
            margin-top: -12
        }

        .direktur_name {
            margin-top: -20
        }
    </style>
</head>

<body>

    <div class="center">
        <img src="https://lsp-eh.com/wp-content/uploads/2024/04/kop_surat.jpg" width="700px">
    </div>

    <h2 style="text-align: right; font-size: 14 px; font-weight: normal">Mangupura, 18 November 2024</h2>
    

    <div class="signature_area">
        <p>Mangupura,
            {{-- {{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dataSurat->tanggal_surat)->locale('id')->isoFormat(' DD MMMM YYYY') }} --}}
        </p>
        <p>LSP Engineering Hospitality Indonesia</p>
        <img src="https://lsp-eh.com/wp-content/uploads/2024/04/cap_ttd_direktur.jpg" width="150px">


        <div class="direktur_name">
            <h3 style="text-decoration: underline">Drs. I Gusti Nyoman Wiantara, M.M</h3>
            <p>Direktur</p>
        </div>
    </div>
</body>

</html>
