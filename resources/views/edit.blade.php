<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>
</head>
<body>
    <h1>Edit Data Buku</h1>

    <form action="/editbuku/{{$buku->id}}" method="post">
        @csrf
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" value="{{$buku->judul}}" required>
        <br>
        <label for="penulis">Penulis</label>
        <input type="text" name="penulis" id="penulis" value="{{$buku->penulis}}" required>
        <br>
        <label for="penerbit">Penerbit</label>
        <input type="text" name="penerbit" id="penerbit" value="{{$buku->penerbit}}" required>
        <br>
        <label for="tahun_terbit">Tahun Terbit</label>
        <input type="date" name="tahun_terbit" id="tahun_terbit" value="{{$buku->tahun_terbit}}" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>