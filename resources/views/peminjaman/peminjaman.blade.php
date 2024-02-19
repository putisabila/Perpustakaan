@extends('layout.main')

@section('container')
<div class="content-wrapper">
    <h1 style="display:flex; justify-content : center;" class="fst-italic mb-5">Data Peminjaman</h1>

    <div class="container">
        <a class="btn btn-primary" href="{{route('peminjaman.create')}}">Tambah +</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>User ID</th>
                            <th>Buku ID</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    <div class="btn-group">
                                        <a class="btn btn-light" href="{{ route('peminjaman.edit', $item->peminjamanID) }}" role="button">Edit</a>
                                        <form action="{{ route('peminjaman.destroy', $item->peminjamanID) }}" method="post" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
