<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suratPerintah;

class suratPerintahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratPerintah = suratPerintah::all();
        return view('layouts.surat-masuk.suratPerintah', compact('suratPerintah'));
    }

    // public function create()
    // {
    //     return view('layouts.surat-masuk.suratPerintah', compact('suratPerintah'));
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
        
        suratPerintah::create($validatedData);

        return redirect()->to('surat-masuk-suratPerintah')->with('failed', 'Surat berhasil ditambahkan.');
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

        suratPerintah::whereId($id)->update($validatedData);

        return redirect()->to('surat-masuk-suratPerintah')->with('failed', 'Surat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = suratPerintah::findOrFail($id);
        $surat->delete();

        return redirect()->to('surat-masuk-suratPerintah')->with('failed', 'Surat berhasil dihapus');
    }
}
