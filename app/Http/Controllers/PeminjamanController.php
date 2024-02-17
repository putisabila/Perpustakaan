<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peminjaman;

class PeminjamanController extends Controller
{
    public function index(){
        $peminjaman = peminjaman::all();
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
        $peminjaman = New Peminjaman;

        $peminjaman->userID = $request->userID;
        $peminjaman->bukuID = $request->bukuID;
        $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
        $peminjaman->tanggal_pengembalian = $request->tanggal_pengembalian;
        $peminjaman->save();

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
        $peminjaman = Peminjaman::find($id);
        return view('peminjaman.edit', compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = peminjaman::find($id);

        $update ->update([
            'userID' => $request->get('userID'),
            'bukuID' => $request->get('bukuID'),
            'tanggal_peminjaman' => $request->get('tanggal_peminjaman'),
            'tanggal_pengembalian' => $request->get('tanggal_pengembalian'),
            'status_peminjaman' => $request->get('status_peminjaman'),
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'peminjaman edit successfully');
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
}
