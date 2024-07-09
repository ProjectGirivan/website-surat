<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keluarBiasa;

class keluarBiasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluarBiasa = keluarBiasa::all();
        return view('layouts.surat-keluar.keluarBiasa', compact('keluarBiasa'));
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
            'nomor' => 'required|string|max:255|unique:keluar_biasas,nomor',
            'klasifikasi' => 'required|string|max:255',
            'lampiran' => 'required|string|max:255',
            'hal' => 'required|string|max:255',
        ], [
            'nomor.unique' => 'Nomor sudah ada dalam database.',
        ]);
        keluarBiasa::create($validatedData);

        return redirect()->to('surat-keluar-keluarBiasa')->with('failed', 'Surat berhasil ditambahkan.');
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
            'nomor' => 'required|string|max:255|unique:keluar_biasas,nomor,' . $id,
            'klasifikasi' => 'required|string|max:255',
            'lampiran' => 'required|string|max:255',
            'hal' => 'required|string|max:255',
        ]);

        keluarBiasa::whereId($id)->update($validatedData);

        return redirect()->to('surat-keluar-keluarBiasa')->with('failed', 'Surat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        keluarBiasa::whereId($id)->delete();

        return redirect()->to('surat-keluar-keluarBiasa')->with('failed', 'Surat berhasil dihapus.');
    }
}
