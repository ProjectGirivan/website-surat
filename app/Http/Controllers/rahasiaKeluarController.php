<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rahasiaKeluar;

class rahasiaKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rahasiaKeluar = rahasiaKeluar::all();
        return view('layouts.surat-keluar.rahasiaKeluar', compact('rahasiaKeluar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor' => 'required|string|max:255|unique:rahasia_keluars,nomor',
            'klasifikasi' => 'required|string|max:255',
            'lampiran' => 'required|string|max:255',
            'hal' => 'required|string|max:255',
        ], [
            'nomor.unique' => 'Nomor sudah ada dalam database.',
        ]);
        rahasiaKeluar::create($validatedData);

        return redirect()->to('surat-keluar-rahasiaKeluar')->with('failed', 'Surat berhasil ditambahkan.');
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
            'nomor' => 'required|string|max:255|unique:rahasia_keluars,nomor,' . $id,
            'klasifikasi' => 'required|string|max:255',
            'lampiran' => 'required|string|max:255',
            'hal' => 'required|string|max:255',
        ]);

        rahasiaKeluar::whereId($id)->update($validatedData);

        return redirect()->to('surat-keluar-rahasiaKeluar')->with('failed', 'Surat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        rahasiaKeluar::whereId($id)->delete();

        return redirect()->to('surat-keluar-rahasiaKeluar')->with('failed', 'Surat berhasil dihapus.');
    }
}
