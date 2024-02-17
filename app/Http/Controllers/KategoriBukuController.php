<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategoriBuku;

class KategoriBukuController extends Controller
{
    public function index(){
        $kategoriBuku = kategoriBuku::all();
        return view('kategoriBuku.kategoriBuku', compact('kategoriBuku'));
    }

    public function create()
    {
        return view('kategoribuku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategoriBuku = New kategoriBuku;

        $kategoriBuku->nama_kategori = $request->nama_kategori;
        $kategoriBuku->save();

        return redirect()->route('kategoribuku.index');
    }

    public function show(kategoriBuku $kategoriBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoriBuku = kategoriBuku::find($id);
        return view('kategoribuku.edit', compact('kategoriBuku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = kategoribuku::find($id);

        $update ->update([
            'nama_kategori' => $request->get('nama_kategori'),
        ]);

        return redirect()->route('kategoribuku.index')->with('success', 'buku edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $kategoriBuku = kategoriBuku::findOrFail($id);
        if ($kategoriBuku) {
            $kategoriBuku->delete();
            return redirect()->route('kategoribuku.index')->with('success', 'Data buku berhasil dihapus');
        }
        return redirect()->route('kategoribuku.index')->with('error', 'Data buku tidak ditemukan');
    }
}
