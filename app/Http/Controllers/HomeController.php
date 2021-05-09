<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->id())->get();
        $uangmasuk = $transactions->where('created_at', '>=', now()->subMonth())->where('jenisuang_id', 1)->sum('jumlah');
        $uangkeluar = $transactions->where('created_at', '>=', now()->subMonth())->where('jenisuang_id', 2)->sum('jumlah');
        $balance = $uangmasuk - $uangkeluar;
        $total = Rekening::where('user_id', auth()->id())->sum('saldo_sekarang');


        return view('home', compact('total', 'uangmasuk', 'uangkeluar', 'balance'));
    }
}
