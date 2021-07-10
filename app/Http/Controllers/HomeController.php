<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryMasuk;
use App\Models\Rekening;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with('userTransactionsByCategory')->get();
        $category_masuks = CategoryMasuk::with('userTransactionsByCategory')->get();

        // $user = Auth::user()->load('transactions');
        return view('home', compact('categories',  'category_masuks'));
    }
}
