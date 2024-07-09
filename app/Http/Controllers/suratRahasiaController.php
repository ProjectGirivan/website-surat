<?php

namespace App\Http\Controllers;

use App\Models\SuratRahasia;
use Illuminate\Http\Request;

class SuratRahasiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratRahasia = SuratRahasia::all();
        return view('layouts.surat-masuk.suratRahasia', compact('suratRahasia'));
    }

    // public function create()
    // {
    //     return view('layouts.surat-masuk.suratRahasia', compact('suratRahasia'));
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
            'nrp' => 'required|string|max:255|unique:surat_rahasias,nrp',
            'pangkat' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ], [
            'nrp.unique' => 'Nomor agenda sudah ada dalam database.',
        ]);
        
        SuratRahasia::create($validatedData);

        return redirect()->to('surat-masuk-suratRahasia')->with('failed', 'Surat berhasil ditambahkan.');
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
            'nrp' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        SuratRahasia::whereId($id)->update($validatedData);

        return redirect()->to('surat-masuk-suratRahasia')->with('failed', 'Surat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = SuratRahasia::findOrFail($id);
        $surat->delete();

        return redirect()->to('surat-masuk-suratRahasia')->with('failed', 'Surat berhasil dihapus');
    }
}
