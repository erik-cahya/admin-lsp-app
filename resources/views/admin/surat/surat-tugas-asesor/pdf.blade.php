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

    <table class="header-table">
        <tr mb-5>
            <td width="15%" class="center">
                <img src="{{ asset('img/no_title_logo.png') }}" width="80px;">
            </td>
            <td width="75%" class="center">
                <div class="title">
                    Lembaga Sertifikasi Profesi
                    <br>
                    <strong>Engineering Hospitality Indonesia</strong>
                    <br>
                    (LSP EHI)
                    <br>
                    Perumahan Taman Mahayu III/No.44, Sempidi, Mengwi, Badung, Bali
                    <br>
                    Web <a href="https://www.lsp-eh.com" target="_blank">www.lsp-eh.com</a>, email : info@lsp-eh.com
                </div>
            </td>
        </tr>
    </table>

    <div class="center">
        {{-- <img src="https://lsp-eh.com/wp-content/uploads/2024/04/kop_surat.jpg" width="700px"> --}}
        <p>
            Lembaga Sertifikasi Profesi
            <br>
            <strong>Engineering Hospitality Indonesia</strong>
            <br>
            (LSP EHI)
            <br>
            Perumahan Taman Mahayu III/No.44, Sempidi, Mengwi, Badung, Bali
            <br>
            Web <a href="https://www.lsp-eh.com" target="_blank">www.lsp-eh.com</a>, email : info@lsp-eh.com
        </p>
        {{-- <h2><strong>Engineering Hospitality Indonesia</strong></h2>
        <h4>(LSP EHI)</h4>
        <h5>Perumahan Taman Mahayu III/No.44, Sempidi, Mengwi, Badung, Bali</h5>
        <h5>Web <a href="https://www.lsp-eh.com" target="_blank">www.lsp-eh.com</a>, Email : info@lsp-eh.com</h5> --}}
        <hr>
    </div>

    <h2 style="text-align: center; text-decoration: underline; font-size: 20px">SURAT TUGAS</h2>
    <h3 style="text-align: center; font-size: 14px">No. {{ $dataSurat->nomor_surat }}</h3>

    <p>Yang bertanda tangan dibawah ini :</p>

    <table>
        <tr style="">
            <td width="100px">Nama</td>
            <td>:</td>
            <td>Drs. I Gusti Nyoman Wiantara, M.M</td>
        </tr>
        <tr>
            <td width="100px">Jabatan</td>
            <td>:</td>
            <td>Direktur LSP Engineering Hospitality Indonesia</td>
        </tr>
        <tr>
            <td width="100px">Alamat</td>
            <td>:</td>
            <td>Perumahan Taman Mahayu III/No.44, Sempidi, Mengwi, Badung, Bali</td>
        </tr>
    </table>

    <p>Dengan ini memberikan tugas kepada :</p>
    <table>
        <tr style="">
            <td width="100px">Nama</td>
            <td>:</td>
            <td>{{ $dataSurat->nama_asesor }}</td>
        </tr>
        <tr>
            <td width="100px">No. Reg</td>
            <td>:</td>
            <td>{{ $dataSurat->no_reg }}</td>
        </tr>

    </table>

    <p>Untuk melaksanakan uji kompetensi skema {{ $dataSurat->skema }} di :</p>
    <table>
        <tr>
            <td width="100px">Nama TUK</td>
            <td>:</td>
            <td>{{ $dataSurat->nama_tuk }}</td>
        </tr>
        <tr>
            <td width="100px">Alamat</td>
            <td>:</td>
            <td>{{ $dataSurat->alamat_tuk }}</td>
        </tr>
        <tr>
            <td width="100px">Hari/Tanggal</td>
            <td>:</td>
            <td>{{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dataSurat->tanggal_uji)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
            </td>
        </tr>
        <tr>
            <td width="100px">Jumlah Asesi</td>
            <td>:</td>
            <td>10 Orang</td>
        </tr>
        <tr>
            <td width="100px">Skema</td>
            <td>:</td>
            <td>{{ $dataSurat->skema }}</td>
        </tr>
    </table>
    <p>Demikian surat tugas ini diberikan untuk dilaksanakan dengan penuh tanggung jawab.</p>

    <div class="signature_area">
        <p>Mangupura,
            {{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $dataSurat->tanggal_surat)->locale('id')->isoFormat(' DD MMMM YYYY') }}
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
