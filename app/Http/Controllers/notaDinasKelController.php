<?php

namespace App\Http\Controllers;

use App\Models\notaDinasKel;
use Illuminate\Http\Request;

class notaDinasKelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notaDinasKel = notaDinasKel::all();
        return view('layouts.surat-keluar.notaDinasKel',  compact('notaDinasKel'));
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
            'nomor_agenda' => 'required|string|max:255|unique:nota_dinas,nomor_agenda',
            'kepada_yth' => 'required|string|max:255',
            'surat_dari' => 'required|string|max:255',
            'nomor_surat_tgl' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
        ], [
            'nomor_agenda.unique' => 'Nomor agenda sudah ada dalam database.',
        ]);
        notaDinasKel::create($validatedData);

        return redirect()->to('surat-keluar-notaDinasKel')->with('failed', 'Surat berhasil ditambahkan.');
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
            'kepada_yth' => 'required|string|max:255',
            'surat_dari' => 'required|string|max:255',
            'nomor_surat_tgl' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
        ]);

        notaDinasKel::whereId($id)->update($validatedData);

        return redirect()->to('surat-keluar-notaDinasKel')->with('failed', 'Surat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        notaDinasKel::whereId($id)->delete();

        return redirect()->to('surat-keluar-notaDinasKel')->with('failed', 'Surat berhasil dihapus.');
    }
}
