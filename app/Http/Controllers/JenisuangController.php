<?php

namespace App\Http\Controllers;

use App\Models\Jenisuang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class JenisuangController extends Controller
{
    public function show(Jenisuang $jenisuang)
    {
        // dd(strrchr(url()->current(), 'o'));
        return view('jenisuang.detail', compact('jenisuang'));
    }
}
