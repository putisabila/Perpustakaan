<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>
</head>
<body>
    <h1>Tambah Data Peminjaman</h1>

    <form action="{{ route('peminjaman.store') }}" method="post">
        @csrf
        <label for="userID">UserID</label>
        <input type="integer" name="userID" required>
        <br>
        <label for="bukuID">BukuID</label>
        <input type="integer" name="bukuID" required>
        <br>
        <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
        <input type="date" name="tanggal_peminjaman" required>
        <br>
        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
        <input type="date" name="tanggal_pengembalian" required>
        <br>
            <label for="status_pengembalian">Status Pengembalian</label>
                <select name="status_pengembalian" id="">
                    <option selected>Open this select menu</option>
                    <option value="belumdikembalikan">Belum dikembalikan</option>
                    <option value="sudahdikembalikan">Sudah dikembalikan</option>
                </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>