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
        if (request()->has('search')) {
            $transactions = $jenisuang->user_transactions->where('category_id', request()->search);
        } else if (request()->has('search2')) {
            $transactions = $jenisuang->user_transactions->where('category_masuk_id', request()->search2);
        } else {
            $transactions = $jenisuang->user_transactions;
        }

        $categories = Category::all();
        return view('jenisuang.detail', compact('transactions', 'jenisuang', 'categories'));
    }
}
