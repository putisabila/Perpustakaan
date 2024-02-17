@extends('layout.main')

@section('container')
<div class="content-wrapper">
  <body>
    <h1 style="display:flex; justify-content : center;" class="fst-italic mb-5">Data Peminjaman</h1>

    <div class="container">
        <a class="btn btn-primary mb-3" href="{{route('peminjaman.create')}}">Tambah +</a>
    </div>

    <div class="container">
        <div class="row">
          <table class="table table-dark table-striped">
            <tr>
                <th>No.</th>
                <th>User ID</th>
                <th>Buku ID</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status Peminjaman</th>
                <th>Pilihan</th>
            </tr>
            @php
                $no = 1;
            @endphp
            
            @foreach ($peminjaman as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->userID }}</td>
                    <td>{{ $item->bukuID }}</td>
                    <td>{{ $item->tanggal_peminjaman }}</td>
                    <td>{{ $item->tanggal_pengembalian }}</td>
                    <td>{{ $item->status_peminjaman }}</td>
                    <td>
                        <div style="display: flex; justify-content: space-between;">  
                            <a class="btn btn-light" href="{{ route('peminjaman.edit', $item->peminjamanID) }}" role="button" style="margin-right: 30px;">Edit</a>
                              <form action="{{ route('peminjaman.destroy', $item->peminjamanID) }}" method="get" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                              @csrf
                              @method('post')
                              <button type="submit" class="btn btn-danger"  style="margin-left: -60px;">Hapus</button>
                              </form>
                        </div>
                    </td>
                </tr>
            @endforeach

          </table>
        </div>
    </div>
</body>
</html>