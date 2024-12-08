<?php

namespace App\Http\Controllers\DataLSP;

use App\Http\Controllers\Controller;
use App\Models\AsesiModel;
use App\Models\AsesorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AsesiController extends Controller
{

    protected $data;

    public function __construct()
    {
        // Inisialisasi titlePage
        $this->data['titlePage'] = 'Data Asesi';
    }

    public function compact(){
        $this->data['dataAsesor'] = AsesorModel::get();
        $this->data['dataAsesi'] = AsesiModel::get();
        
        return view('admin.asesi.compact.index', $this->data);
    }

    public function index()
    {
        $this->data['dataAsesor'] = AsesorModel::get();
        $this->data['dataAsesi'] = AsesiModel::get();
        
        return view('admin.asesi.index', $this->data);
    }

    public function import(Request $request)
    {
         $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        $data = Excel::toArray([], $request->file('file')); // Baca file Excel
        $rows = $data[0]; // Ambil sheet pertama
        $duplicates = []; // Array untuk menyimpan data yang duplikat

        foreach ($rows as $key => $row) {
            if ($key == 0) continue; // Skip header

            // Bersihkan spasi berlebih dari setiap kolom
            $nama_asesi = preg_replace('/\s+/', ' ', trim($row[1]));
            $nik = preg_replace('/\s+/', ' ', trim($row[2]));
            $tempat_lahir = preg_replace('/\s+/', ' ', trim($row[3]));
            $tanggal_lahir = preg_replace('/\s+/', ' ', trim($row[4]));
            $jenis_kelamin = preg_replace('/\s+/', ' ', trim($row[5]));
            $tempat_tinggal = preg_replace('/\s+/', ' ', trim($row[6]));
            $kode_kabupaten = preg_replace('/\s+/', ' ', trim($row[7]));
            $kode_provinsi = preg_replace('/\s+/', ' ', trim($row[8]));
            $telp = preg_replace('/\s+/', ' ', trim($row[9]));
            $email = preg_replace('/\s+/', ' ', trim($row[10]));
            $kode_pendidikan = preg_replace('/\s+/', ' ', trim($row[11]));
            $kode_pekerjaan = preg_replace('/\s+/', ' ', trim($row[12]));
            $kode_jadwal = preg_replace('/\s+/', ' ', trim($row[13]));
            $tanggal_uji = preg_replace('/\s+/', ' ', trim($row[14]));
            $nomor_registrasi_asesor = preg_replace('/\s+/', ' ', trim($row[15]));
            $kode_sumber_anggaran = preg_replace('/\s+/', ' ', trim($row[16]));
            $kode_kementrian = preg_replace('/\s+/', ' ', trim($row[17]));
            $status_kompeten = preg_replace('/\s+/', ' ', trim($row[18]));
            

            // cek data nik duplicate on database
            $exists = DB::table('asesi')->where([
                ['nik', '=', $nik],
            ])->exists();
            // $exists = DB::table('asesi')->where([
            //     ['nama_asesi', '=', $nama_asesi],
            //     ['nik', '=', $nik],
            //     ['tempat_lahir', '=', $tempat_lahir],
            //     ['tanggal_lahir', '=', $tanggal_lahir],
            //     ['jenis_kelamin', '=', $jenis_kelamin],
            //     ['tempat_tinggal', '=', $tempat_tinggal],
            //     ['kode_kabupaten', '=', $kode_kabupaten],
            //     ['kode_provinsi', '=', $kode_provinsi],
            //     ['telp', '=', $telp],
            //     ['email', '=', $email],
            //     ['kode_pendidikan', '=', $kode_pendidikan],
            //     ['kode_pekerjaan', '=', $kode_pekerjaan],
            //     ['kode_jadwal', '=', $kode_jadwal],
            //     ['tanggal_uji', '=', $tanggal_uji],
            //     ['nomor_registrasi_asesor', '=', $nomor_registrasi_asesor],
            //     ['kode_sumber_anggaran', '=', $kode_sumber_anggaran],
            //     ['kode_kementrian', '=', $kode_kementrian],
            //     ['status_kompeten', '=', $status_kompeten],
                
            // ])->exists();

            if ($exists) {
                // Simpan seluruh baris sebagai duplikat
                $duplicates[] = [
                    'nama_asesi' => $nama_asesi,
                    'nik' => $nik,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_tinggal' => $tempat_tinggal,
                    'kode_kabupaten' => $kode_kabupaten,
                    'kode_provinsi' => $kode_provinsi,
                    'telp' => $telp,
                    'email' => $email,
                    'kode_pendidikan' => $kode_pendidikan,
                    'kode_pekerjaan' => $kode_pekerjaan,
                    'kode_jadwal' => $kode_jadwal,
                    'tanggal_uji' => $tanggal_uji,
                    'nomor_registrasi_asesor' => $nomor_registrasi_asesor,
                    'kode_sumber_anggaran' => $kode_sumber_anggaran,
                    'kode_kementrian' => $kode_kementrian,
                    'status_kompeten' => $status_kompeten
                ];
            } else {
                // Masukkan data ke database jika tidak duplikat
                DB::table('asesi')->insert([
                    'nama_asesi' => $nama_asesi,
                    'nik' => $nik,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_tinggal' => $tempat_tinggal,
                    'kode_kabupaten' => $kode_kabupaten,
                    'kode_provinsi' => $kode_provinsi,
                    'telp' => $telp,
                    'email' => $email,
                    'kode_pendidikan' => $kode_pendidikan,
                    'kode_pekerjaan' => $kode_pekerjaan,
                    'kode_jadwal' => $kode_jadwal,
                    'tanggal_uji' => $tanggal_uji,
                    'nomor_registrasi_asesor' => $nomor_registrasi_asesor,
                    'kode_sumber_anggaran' => $kode_sumber_anggaran,
                    'kode_kementrian' => $kode_kementrian,
                    'status_kompeten' => $status_kompeten
                ]);
            }
        }

        // Kirim data duplikat ke view
        return back()->with([
            'success' => 'Data berhasil diimpor!',
            'duplicates' => $duplicates, // Kirim baris-baris duplikat
        ]);
    }
}