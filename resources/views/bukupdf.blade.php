<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 100%;
            height: auto;
            object-position: 'center';
        }
    </style>
</head>
<body>
    <div class="header">
        <img class="logo" src="{{ public_path('img/surat.jpeg') }}" alt="">
        <h2>Data Buku Perpustakaan</h2>
    </div>
    <table border="1" style="width: 100%">
        <thead>
            <tr>
                <th><strong>Kode Buku</strong></th>
                <th><strong>Judul Buku</strong></th>
                <th><strong>Penulis</strong></th>
                <th><strong>Penerbit</strong></th>
                <th><strong>Tahun Terbit</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($ar_buku as $b)
            <tr>
                <td>{{$b->id}}</td>
                <td>{{$b->judul}}</td>
                <td>{{$b->penulis}}</td>
                <td>{{$b->penerbit}}</td>
                <td>{{$b->tahun_terbit}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="footer">
        <!-- Tanggal, Bulan, Tahun -->
        <div style="float: right; margin-top: 20px;">
            <div>Sumatera Barat, {{ now()->format('d F Y') }}</div>
            <div style="margin-top: 10px;">Petugas,</div>
            <!-- Nama Pengguna -->
            <div style="margin-top: 80px;">{{ $user }}</div>
        </div>
    </div>
</body>
</html>