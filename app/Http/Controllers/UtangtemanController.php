<?php

namespace App\Http\Controllers;

use App\Models\Utangteman;
use Illuminate\Http\Request;

class UtangtemanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utangs = Utangteman::where('user_id', auth()->id())->where('lunas', 0)->get();
        return view('utangteman.index', compact('utangs'));
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
            'nama' => 'required',
            'jumlah' => ['required', 'numeric'],
            'keterangan' => 'nullable',
        ]);
        $utang = new Utangteman;
        $utang->user_id = auth()->id();
        $utang->nama = request()->nama;
        $utang->jumlah = request()->jumlah;
        $utang->keterangan = request()->keterangan;
        $utang->lunas = 0;
        $utang->save();

        return redirect()->back()->with('success', 'Utang Teman Anda Telah Tersimpan');
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
            'nama' => 'required',
            'keterangan' => 'nullable',
        ]);
        Utangteman::where('id', $id)->update([
            'nama' => request()->nama,
            'keterangan' => request()->keterangan,
        ]);

        return redirect()->back()->with('success', 'Update Succesful');
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
