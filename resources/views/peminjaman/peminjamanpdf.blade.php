<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman PDF</title>
</head>
<body>
    <center>
        <h2>Data Peminjaman Perpustakaan</h2>
        <h5>by Puti Sabila</h5>
    </center>
    <table border="1" style="width: 100%">
        <thead>
            <tr>
                <th><strong>No</strong></th>
                <th><strong>UserID</strong></th>
                <th><strong>Kode Buku</strong></th>
                <th><strong>Tanggal Peminjaman</strong></th>
                <th><strong>Tanggal Pengembalian</strong></th>
                <th><strong>Status Peminjaman</strong></th>
            </tr>
        </thead>
        <tbody>
            @php 
                $no=1 
            @endphp
            @foreach($peminjaman as $b)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{$b->userID}}</td>
                <td>{{$b->bukuID}}</td>
                <td>{{$b->tanggal_peminjaman}}</td>
                <td>{{$b->tanggal_pengembalian}}</td>
                <td>{{$b->status_peminjaman}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>