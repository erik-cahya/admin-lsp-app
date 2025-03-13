<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Models\AsesiModel;
use App\Models\AsesorModel;
use App\Models\SuratPermohonanBlankoModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SuratPermohonanBlankoController extends Controller
{
    protected $data;

    public function __construct()
    {
        // Inisialisasi titlePage
        $this->data['titlePage'] = 'Surat Permohonan Blanko';
    }

    public function index(){
        $this->data['data_surat'] = SuratPermohonanBlankoModel::withCount('asesi')->orderBy('nomor_surat', 'ASC')->get();

        return view('admin.surat.surat-permohonan-blanko.index', $this->data);
    }

    public function create(){
        return view('admin.surat.surat-permohonan-blanko.create', $this->data);
    }

    public function store(Request $request){
        // dd($request->all());

        $tanggalSuratFormatted = Carbon::createFromFormat('d-F-Y', $request->tanggal_surat)->locale('id')->translatedFormat('d F Y');

        $validated = $request->validate([
            'nomor_surat' => 'required|unique:surat_permohonan_blanko',
            'tanggal_surat' => 'required',
        ], [
            'nomor_surat.required' => 'Nomor surat harus diisi.',
            'nomor_surat.unique' => 'Nomor surat ini sudah digunakan.',
        ]);

        $namaSurat =  'Surat Permohonan Blanko_' . $request->nomor_surat . '_' . $tanggalSuratFormatted;

        SuratPermohonanBlankoModel::create([
            'id' => Str::random(40),
            'nomor_surat' => $request->nomor_surat,
            'nama_surat' => $namaSurat,
            'tanggal_surat' => Carbon::createFromFormat('d-F-Y', $request->tanggal_surat)->format('Y-m-d'),
        ]);

        $flashData = [
            'judul' => 'Create Surat Success',
            'pesan' => 'Surat Permohonan Berhasil Dibuat',
            'swalFlashIcon' => 'success',
        ];
        return redirect('/suratPermohonanBlanko')->with('flashData', $flashData);

        dd($request->all());
    }
}
