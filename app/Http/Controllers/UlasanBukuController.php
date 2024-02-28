<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ulasanBuku;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class UlasanBukuController extends Controller
{
    public function index(){
        $ulasanBuku = ulasanBuku::paginate(5);
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
        // dd($request);
        $update = ulasanbuku::find($id);

        $update->userID = $request->userID;
        $update->bukuID = $request->bukuID;
        $update->ulasan = $request->ulasan;
        $update->rating = $request->rating;
        $update->save();
        return redirect()->route('ulasanbuku.index');
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

    public function generatePDF()
    {
        $ulasanbuku = ulasanbuku::all();

        $pdf = PDF::loadView('ulasanBuku.ulasanBukupdf', ['ulasanBuku' => $ulasanbuku]);

        return $pdf->stream('laporan-ulasanbuku.pdf');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $ulasanBuku = ulasanBuku::where('userID', 'LIKE', "%$search%")
            ->orWhere('bukuID', 'LIKE', "%$search%")
            ->orWhere('ulasan', 'LIKE', "%$search%")
            ->orWhere('rating', 'LIKE', "%$search%")
            ->paginate(5);

        return view('ulasanBuku.ulasanBuku', compact('ulasanBuku'));
    }
}
