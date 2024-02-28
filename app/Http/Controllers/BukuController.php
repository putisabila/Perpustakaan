<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $buku = buku::orderBy('id', 'ASC')->paginate(5);
        return view('buku', compact('buku'));
    }

    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $buku = New Buku;

        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->stok = $request->stok;
        $buku->save();

        return redirect()->route('buku.index');
    }

    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = buku::find($id);

        $update ->update([
            'judul' => $request->get('judul'),
            'penulis' => $request->get('penulis'),
            'penerbit' => $request->get('penerbit'),
            'tahun_terbit' => $request->get('tahun_terbit'),
        ]);

        return redirect()->route('buku.index')->with('success', 'buku edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $buku = Buku::findOrFail($id);
        if ($buku) {
            $buku->delete();
            return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus');
        }
        return redirect()->route('buku.index')->with('error', 'Data buku tidak ditemukan');
    }

    public function generatePDF()
    {
        $ar_buku = buku::all();
    
    // Pastikan ada pengguna yang masuk
    if(auth()->check()) {
        $user = auth()->user()->name;
    } else {
        $user = "Nama Pengguna Default";
    }

    $pdf = PDF::loadView('bukupdf', [
        'ar_buku' => $ar_buku,
        'user' => $user // Memasukkan $user ke dalam data yang dilewatkan ke view
    ]);

    return $pdf->stream('laporan-buku.pdf');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $buku = buku::where('judul', 'LIKE', "%$search%")
            ->orWhere('penulis', 'LIKE', "%$search%")
            ->orWhere('penerbit', 'LIKE', "%$search%")
            ->orWhere('tahun_terbit', 'LIKE', "%$search%")
            ->orderBy('id', 'ASC')
            ->paginate(5);

        return view('buku', compact('buku'));
    }
}
