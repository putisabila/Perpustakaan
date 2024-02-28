<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ulasan Buku PDF</title>
</head>
<body>
    <center>
        <h2>Data Ulasan Buku Perpustakaan</h2>
        <h5>by Puti Sabila</h5>
    </center>
    <table border="1" style="width: 100%">
        <thead>
            <tr>
                <th><strong>No</strong></th>
                <th><strong>UserID</strong></th>
                <th><strong>BukuID</strong></th>
                <th><strong>Ulasan</strong></th>
                <th><strong>rating</strong></th>
            </tr>
        </thead>
        <tbody>
            @php 
                $no=1 
            @endphp
            @foreach($ulasanBuku as $b)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{$b->userID}}</td>
                <td>{{$b->bukuID}}</td>
                <td>{{$b->ulasan}}</td>
                <td>{{$b->rating}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>