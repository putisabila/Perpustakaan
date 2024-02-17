<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>
</head>
<body>
    <h1>Tambah Data Buku</h1>

    <form action="{{ route('buku.store') }}" method="post">
        @csrf
        <label for="judul">Judul</label>
        <input type="text" name="judul" required>
        <br>
        <label for="penulis">Penulis</label>
        <input type="text" name="penulis" required>
        <br>
        <label for="penerbit">Penerbit</label>
        <input type="text" name="penerbit" required>
        <br>
        <label for="tahun_terbit">Tahun Terbit</label>
        <input type="date" name="tahun_terbit" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>