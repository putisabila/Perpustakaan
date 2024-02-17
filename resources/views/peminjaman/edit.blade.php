<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>
</head>
<body>
    <h1>Edit Data Peminjaman</h1>

    <form action="/editpeminjaman/{{$peminjaman->id}}" method="post">
        @csrf
        <label for="userID">UserID</label>
        <input type="text" name="userID" id="userID" value="{{$peminjaman->userID}}" required>
        <br>
        <label for="bukuID">BukuID</label>
        <input type="text" name="bukuID" id="bukuID" value="{{$peminjaman->bukuID}}" required>
        <br>
        <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
        <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" value="{{$peminjaman->tanggal_peminjaman}}" required>
        <br>
        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
        <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" value="{{$peminjaman->tanggal_pengembalian}}" required>
        <br>
        <label for="status_pengembalian">Status Pengembalian</label>
            <select name="jenisKelamin" id="" value="{{$peminjaman->status_pengembalian}}" required>
                <option selected>Open this select menu</option>
                <option value="belumdikembalikan">Belum dikembalikan</option>
                <option value="sudahdikembalikan">Sudah dikembalikan</option>
            </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>