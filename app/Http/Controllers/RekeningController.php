<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Rekening;
use App\Models\Utang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeniss = Jenis::with('user_rekenings')->get();
        return view('rekening.index', compact('jeniss'));
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
            'jenis_id' => ['required', 'in:' . Jenis::pluck('id')->implode(',')],
            'nama_akun' => 'required',
            'nama_bank' => 'nullable',
            'saldo_sekarang' => ['required', 'numeric'],
            'saldo_mengendap' => ['nullable', 'numeric'],
            'keterangan' => 'nullable',
        ]);

        Rekening::create($request->all());

        return redirect()->back()->with('success', 'Rekening Baru telah Terdaftar');
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
        request()->validate([
            'nama_akune' => 'required',
            'nama_banke' => 'nullable',
            'saldo_mengendap' => ['nullable', 'numeric'],
            'keterangan' => 'nullable',
        ]);

        Rekening::findOrFail($id)->update([
            'nama_akun' => request()->nama_akune,
            'nama_bank' => request()->nama_banke,
            'saldo_mengendap' => request()->saldo_mengendape,
            'keterangan' => request()->keterangane,
        ]);

        return redirect()->back()->with('success', 'Update Succesful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekening $rekening)
    {
        $rekening->delete();
        return redirect()->back()
            ->with('restore', 'Rekening has been deleted successfully. <a class="btn btn-warning btn-sm" href="' . route('rekenings.restore', $rekening->id) . '">Whhops,Undo</a>');
    }
    public function restore(int $rekening_id)
    {
        $rekening = Rekening::withTrashed()->findOrFail($rekening_id);

        if ($rekening && $rekening->trashed()) {
            $rekening->restore();
        }
        return redirect()->back()
            ->with('success', 'Rekening restored successfully');
    }
}
