<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ulasanBuku;

class UlasanBukuController extends Controller
{
    public function index(){
        $ulasanBuku = ulasanBuku::all();
        return view('ulasanBuku.ulasanBuku', compact('ulasanBuku'));
    }

    public function create()
    {
        return view('ulasanBuku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ulasanBuku = New ulasanbuku;

        $ulasanBuku->userID = $request->userID;
        $ulasanBuku->bukuID = $request->bukuID;
        $ulasanBuku->ulasan = $request->ulasan;
        $ulasanBuku->rating = $request->rating;
        $ulasanBuku->save();

        return redirect()->route('ulasanbuku.index');
    }

    public function show(ulasanbuku $ulasanBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ulasanBuku = ulasanbuku::find($id);
        return view('ulasanBuku.edit', compact('ulasanBuku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = ulasanbuku::find($id);

        $update ->update([
            'userID' => $request->get('userID'),
            'bukuID' => $request->get('bukuID'),
            'ulasan' => $request->get('ulasan'),
            'rating' => $request->get('rating'),
        ]);

        return redirect()->route('ulasanbuku.index')->with('success', 'ulasan buku edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $ulasanBuku = ulasanbuku::findOrFail($id);
        if ($ulasanBuku) {
            $ulasanBuku->delete();
            return redirect()->route('ulasanbuku.index')->with('success', 'Data ulasan buku berhasil dihapus');
        }
        return redirect()->route('ulasanbuku.index')->with('error', 'Data ulasan buku tidak ditemukan');
    }
}
