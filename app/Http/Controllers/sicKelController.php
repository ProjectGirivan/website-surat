<?php

namespace App\Http\Controllers;

use App\Models\sicKel;
use Illuminate\Http\Request;

class sicKelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sicKel = sicKel::all();
        return view('layouts.surat-keluar.SIC', compact('sicKel'));
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
            'nrp' => 'required|string|max:255|unique:sic_kels,nrp',
            'pangkat' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kesatuan' => 'required|string|max:255',
            'diberi_izin_oleh' => 'required|string|max:255',
            'jenis_cuti' => 'required|string|max:255',
            'lama_cuti' => 'required|string|max:255',
            'mulai_tanggal' => 'required|date',
            'sd_tanggal' => 'required|date',
            'pergi_dari' => 'required|string|max:255',
            'tujuan_ke' => 'required|string|max:255',
            'transportasi' => 'required|string|max:255',
            'pengikut' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
        ], [
            'nrp.unique' => 'Nomor NRP sudah ada dalam database.',
        ]);
        
        sicKel::create($validatedData);

        return redirect()->to('surat-keluar-SIC')->with('failed', 'Surat berhasil ditambahkan.');
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
            'nrp' => 'required|string|max:255|unique:sic_kels,nrp,' . $id,
            'jabatan' => 'required|string|max:255',
            'kesatuan' => 'required|string|max:255',
            'diberi_izin_oleh' => 'required|string|max:255',
            'jenis_cuti' => 'required|string|max:255',
            'lama_cuti' => 'required|string|max:255',
            'mulai_tanggal' => 'required|date',
            'sd_tanggal' => 'required|date',
            'pergi_dari' => 'required|string|max:255',
            'tujuan_ke' => 'required|string|max:255',
            'transportasi' => 'required|string|max:255',
            'pengikut' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        sicKel::whereId($id)->update($validatedData);

        return redirect()->to('surat-keluar-SIC')->with('failed', 'Surat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = sicKel::findOrFail($id);
        $surat->delete();

        return redirect()->to('surat-keluar-SIC')->with('failed', 'Surat berhasil dihapus');
    }
}
