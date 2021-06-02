<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rekening;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();

        // dd(now()->subMonth());
        return view('home', compact('categories'));
    }
}
