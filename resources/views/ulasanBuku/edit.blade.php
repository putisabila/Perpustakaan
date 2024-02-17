<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>
</head>
<body>
    <h1>Edit Data Ulasan Buku</h1>

    <form action="/editulasanbuku/{{$ulasanBuku->id}}" method="post">
        @csrf
        <label for="userID">UserID</label>
        <input type="integer" name="userID" id="userID" value="{{$ulasanBuku->userID}}" required>
        <br>
        <label for="bukuID">BukuID</label>
        <input type="integer" name="bukuID" id="bukuID" value="{{$ulasanBuku->bukuID}}" required>
        <br>
        <label for="ulasan">Ulasan</label>
        <input type="text" name="ulasan" id="ulasan" value="{{$ulasanBuku->ulasan}}" required>
        <br>
        <label for="rating">Rating</label>
        <input type="integer" name="rating" id="rating" value="{{$ulasanBuku->rating}}" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>