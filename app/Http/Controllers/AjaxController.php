<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;

class AjaxController extends Controller
{
    public function province() {
        $provData = Province::all();
        return response()->json($provData);
    }

    public function city($id) {
        $prov = Province::findOrFail($id);
        $citiesData = $prov->getCities()->get();
        return response()->json($citiesData);
    }
}
