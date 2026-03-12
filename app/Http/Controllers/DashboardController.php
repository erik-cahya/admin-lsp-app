<?php

namespace App\Http\Controllers;

use App\Models\AsesiDataModel;
use App\Models\AsesorModel;
use App\Models\ManajemenModel;
use App\Models\SkemaModel;
use App\Models\TUKModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;




class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // dd(Auth::user());
        $data['countManajemen'] = ManajemenModel::count();

        $data['countAsesi'] = AsesiDataModel::count();
        $data['countAsesor'] = AsesorModel::count();
        // dd($data['countAsesor']);
        $data['countTUK'] = TUKModel::count();
        $data['countSkema'] = SkemaModel::count();
        return view('admin.dashboard.index', $data);
    }
}
