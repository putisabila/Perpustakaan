<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>
</head>
<body>
    <h1>Edit Data kategori Buku</h1>

    <form action="/editkategoribuku/{{$kategoriBuku->id}}" method="post">
        @csrf
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" name="nama_kategori" id="nama_kategori" value="{{$kategoriBuku->nama_kategori}}" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>