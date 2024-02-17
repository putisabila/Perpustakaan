<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>
</head>
<body>
    <h1>Tambah Data Kategori Buku</h1>

    <form action="{{ route('kategoribuku.store') }}" method="post">
        @csrf
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" name="nama_kategori" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>