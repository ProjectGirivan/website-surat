<?php
namespace App\Http\Controllers;

use App\Models\sijKel;
use Illuminate\Http\Request;

class sijKelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sijKel = sijKel::all();
        return view('layouts.surat-keluar.SIJ', compact('sijKel'));
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
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|max:255|unique:sij_kels,nrp',
            'pangkat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'pengikut' => 'nullable|string|max:255',
            'pergi_dari' => 'required|string|max:255',
            'tujuan_ke' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
            'berkendaraan' => 'required|string|max:255',
            'berangkat_tanggal' => 'required|date',
            'kembali_tanggal' => 'required|date',
            'catatan' => 'nullable|string',
        ], [
            'nrp.unique' => 'Nomor NRP sudah ada dalam database.',
        ]);

        sijKel::create($validatedData);

        return redirect()->to('surat-keluar-SIJ')->with('failed', 'Surat berhasil ditambahkan.');
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
            'nrp' => 'required|string|max:255|unique:sij_kels,nrp,' . $id,
            'pangkat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'pengikut' => 'nullable|string|max:255',
            'pergi_dari' => 'required|string|max:255',
            'tujuan_ke' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
            'berkendaraan' => 'required|string|max:255',
            'berangkat_tanggal' => 'required|date',
            'kembali_tanggal' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        sijKel::whereId($id)->update($validatedData);

        return redirect()->to('surat-keluar-SIJ')->with('failed', 'Surat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = sijKel::findOrFail($id);
        $surat->delete();

        return redirect()->to('surat-keluar-SIJ')->with('failed', 'Surat berhasil dihapus');
    }
}
?>