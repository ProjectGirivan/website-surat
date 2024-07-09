<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suratPerintahKel;

class suratPerintahKelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratPerintahKel = suratPerintahKel::all();
        return view('layouts.surat-keluar.suratPerintahKel', compact('suratPerintahKel'));
    }

    // public function create()
    // {
    //     return view('layouts.surat-keluar.suratPerintahKel', compact('suratPerintahKel'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dasar' => 'required|string|max:255',
            'kepada' => 'required|string|max:255',
        ]);
        
        suratPerintahKel::create($validatedData);

        return redirect()->to('surat-keluar-suratPerintahKel')->with('failed', 'Surat berhasil ditambahkan.');
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
        $validatedData = $request->validate([
            'dasar' => 'required|string|max:255',
            'kepada' => 'required|string|max:255',
        ]);

        suratPerintahKel::whereId($id)->update($validatedData);

        return redirect()->to('surat-keluar-suratPerintahKel')->with('failed', 'Surat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = suratPerintahKel::findOrFail($id);
        $surat->delete();

        return redirect()->to('surat-keluar-suratPerintahKel')->with('failed', 'Surat berhasil dihapus');
    }
}
