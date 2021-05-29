<?php

namespace App\Http\Controllers;

use App\Models\Utang;
use Illuminate\Http\Request;

class UtangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('utang.index');
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
        // dd(request()->all());
        request()->validate([
            'nama' => 'required',
            'jumlah' => ['required', 'numeric'],
            'keterangan' => 'nullable',
        ]);
        Utang::create($request->validated());


        return redirect()->back()->with('success', 'Utang Telah Tersimpan');
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
        // dd(request()->all());

        request()->validate([
            'nama' => 'required',
            'keterangan' => 'nullable',
        ]);
        Utang::where('id', $id)->update([
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
