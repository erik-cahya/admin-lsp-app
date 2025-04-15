<?php

namespace App\Http\Controllers\DataLSP;

use App\Http\Controllers\Controller;
use App\Models\AsesiGroupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupAsesiController extends Controller
{
    public function store(Request $request){
        AsesiGroupModel::create([
            'nama_group_asesi' => $request->nama_group,
        ]);

        $flashData = [
            'judul' => 'Success',
            'pesan' => 'Group Asesi Berhasil Ditambahkan',
            'swalFlashIcon' => 'success',
        ];
        return back()->with('flashData', $flashData);

    }

    public function destroy(Request $request, $id){
        DB::table('asesi_data')->where('id_asesi_group', $id)->delete();

        AsesiGroupModel::destroy($id);

        $flashData = [
            'judul' => 'Delete Success',
            'pesan' => 'Group Asesi Telah Dihapus',
            'swalFlashIcon' => 'success',
        ];
        return response()->json(['message' => 'Group Asesi Berhasil Dihapus']);
    }
}
