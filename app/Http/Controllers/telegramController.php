<?php

namespace App\Http\Controllers;

use App\Models\telegram;
use Illuminate\Http\Request;

class telegramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telegram = telegram::all();
        return view('layouts.surat-masuk.telegram',  compact('telegram'));
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
        telegram::create($validatedData);

        return redirect()->to('surat-masuk-telegram')->with('failed', 'Surat berhasil ditambahkan.');
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

        telegram::whereId($id)->update($validatedData);

        return redirect()->to('surat-masuk-telegram')->with('failed', 'Surat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        telegram::whereId($id)->delete();

        return redirect()->to('surat-masuk-telegram')->with('failed', 'Surat berhasil dihapus.');
    }
}
