<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function _construct(){
        $this->middleware('kasir');
    }
}
