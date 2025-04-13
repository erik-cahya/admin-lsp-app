<?php

namespace App\Http\Controllers\DataLSP;

use App\Http\Controllers\Controller;
use App\Models\AsesiGroupModel;
use App\Models\DataAsesiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupAsesiController extends Controller
{
    //

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
