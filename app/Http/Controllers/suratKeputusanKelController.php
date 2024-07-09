<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suratKeputusanKel;

class suratKeputusanKelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratKeputusanKel = suratKeputusanKel::all();
        return view('layouts.surat-keluar.suratKeputusanKel', compact('suratKeputusanKel'));
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
            'nip' => 'required|string|max:255|unique:surat_Keputusan_Kels,nip',
            'pangkat' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kesatuan' => 'required|string|max:255',
        ], [
            'nip.unique' => 'Nomor agenda sudah ada dalam database.',
        ]);
        
        suratKeputusanKel::create($validatedData);

        return redirect()->to('surat-keluar-suratKeputusanKel')->with('failed', 'Surat berhasil ditambahkan.');
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
            'nama' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kesatuan' => 'required|string|max:255',
        ]);

        suratKeputusanKel::whereId($id)->update($validatedData);

        return redirect()->to('surat-keluar-suratKeputusanKel')->with('failed', 'Surat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = suratKeputusanKel::findOrFail($id);
        $surat->delete();

        return redirect()->to('surat-keluar-suratKeputusanKel')->with('failed', 'Surat berhasil dihapus');
    }
}
