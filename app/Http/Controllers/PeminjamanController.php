<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peminjaman;
use App\Models\Buku;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PeminjamanController extends Controller
{
    public function index(){
        $peminjaman = peminjaman::paginate(5);
        return view('peminjaman.peminjaman', compact('peminjaman'));
    }

    public function create()
    {
        return view('peminjaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validasi = $request->validate([
        'status_peminjaman' =>'required'
    ]);
    $peminjaman = new Peminjaman;

    $peminjaman->userID = $request->userID;
    $peminjaman->bukuID = $request->bukuID;
    $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
    $peminjaman->tanggal_pengembalian = $request->tanggal_pengembalian;
    $peminjaman->status_peminjaman = $request->status_peminjaman;    

    $peminjaman->save();

    $buku = Buku::find($request->bukuID);
    $buku->stok--;
    $buku->save();

    return redirect()->route('peminjaman.index');
}



    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $peminjaman = peminjaman::find($id);
        return view('peminjaman.edit', compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validasi = $request->validate([
        'status_peminjaman' =>'required'
    ]);
    $update = Peminjaman::find($id);
    $update->userID = $request->userID;
    $update->bukuID = $request->bukuID;
    $update->tanggal_peminjaman = $request->tanggal_peminjaman;
    $update->tanggal_pengembalian = $request->tanggal_pengembalian;
    $update->status_peminjaman = $request->status_peminjaman;

    $update->save();

    $buku = Buku::find($request->bukuID);
    $buku->stok++;
    $buku->save();

    return redirect()->route('peminjaman.index')->with('success', 'peminjaman successfully updated');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        if ($peminjaman) {
            $peminjaman->delete();
            return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus');
        }
        return redirect()->route('peminjaman.index')->with('error', 'Data peminjaman tidak ditemukan');
    }

    public function generatePDF()
    {
        $peminjaman = peminjaman::all();

        $pdf = PDF::loadView('peminjaman.peminjamanpdf', ['peminjaman' => $peminjaman]);

        return $pdf->stream('laporan-peminjaman.pdf');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $peminjaman = peminjaman::where('userID', 'LIKE', "%$search%")
            ->orWhere('bukuID', 'LIKE', "%$search%")
            ->paginate(5);

        return view('peminjaman.peminjaman', compact('peminjaman'));
    }
}
