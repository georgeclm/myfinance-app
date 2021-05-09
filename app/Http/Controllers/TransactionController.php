<?php

namespace App\Http\Controllers;

use App\Models\Jenisuang;
use App\Models\Rekening;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisuangs = Jenisuang::with('user_transactions')->get();
        $rekenings = Rekening::where('user_id', auth()->id())->get();
        return view('transaction.index', compact('jenisuangs', 'rekenings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'jenisuang_id' => 'required',
            'jumlah' => ['required', 'numeric'],
            'kategori' => 'sometimes',
            'akun1' => 'required',
            'akun2' => 'sometimes',
            'keterangan' => 'nullable',
        ]);
        $rekening1 = Rekening::firstWhere('id', request()->akun1);

        if (request()->jenisuang_id == 1) {
            $rekening1->saldo_sekarang += request()->jumlah;
            $rekening1->save();
        } else if (request()->jenisuang_id == 2) {
            if ($rekening1->saldo_sekarang < request()->jumlah) {
                return redirect()->back()->with('error', 'Jumlah melebihi saldo');
            }
            $rekening1->saldo_sekarang -= request()->jumlah;
            $rekening1->save();
        } else {
            if ($rekening1->saldo_sekarang < request()->jumlah) {
                return redirect()->back()->with('error', 'Jumlah melebihi saldo');
            }
            $rekening1->saldo_sekarang -= request()->jumlah;
            $rekening2 = Rekening::firstWhere('id', request()->akun2);
            $rekening2->saldo_sekarang += request()->jumlah;
            $rekening1->save();
            $rekening2->save();
        }
        $transaction = new Transaction;
        $transaction->user_id = auth()->id();
        $transaction->rekening_id = request()->akun1;
        $transaction->rekening_id2 = request()->akun2;
        $transaction->jenisuang_id = request()->jenisuang_id;
        $transaction->jumlah = request()->jumlah;
        $transaction->kategori = request()->kategori;
        $transaction->keterangan = request()->keterangan;
        $transaction->save();

        return redirect()->back()->with('success', 'Transakasi Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
