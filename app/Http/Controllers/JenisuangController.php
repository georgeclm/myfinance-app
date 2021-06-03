<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Jenisuang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class JenisuangController extends Controller
{
    public function show(Jenisuang $jenisuang)
    {
        $transactions = (request()->has('search'))
            ? $jenisuang->user_transactions->where('category_id', request()->search)
            : $jenisuang->user_transactions;
        $transactions = (request()->has('search2'))
            ? $jenisuang->user_transactions->where('category_masuk_id', request()->search2)
            : $jenisuang->user_transactions;

        $categories = Category::all();
        return view('jenisuang.detail', compact('transactions', 'jenisuang', 'categories'));
    }
}
