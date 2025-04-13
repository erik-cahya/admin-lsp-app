<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\AsesiModel;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function index(){

        $data['asesi'] = AsesiModel::get();
        return view('Developer.select2.index', $data);
    }
}
