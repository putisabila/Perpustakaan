@php
    $ar_status = [ 'Meminjam' => 'Meminjam', 'Sudah Dikembalikan' => 'Sudah Dikembalikan']
@endphp
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Perpustakaan</title>
  </head>
  <body>
    <div class="container">
    <div class="card mt-5">
        <div class="card-header">
          <h2>Tambah Data Peminjaman</h2>
        </div>
        <form action="{{ route('peminjaman.store') }}" method="post">
            @csrf
            <div class="card-body">
                    <div class="row mb-3">
                      <label for="userID" class="col-sm-2 col-form-label">UserID</label>
                      <div class="col-sm-10">
                        <input type="integer" name="userID" class="form-control" id="userID">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="bukuID" class="col-sm-2 col-form-label">Kode Buku</label>
                      <div class="col-sm-10">
                        <input type="integer" name="bukuID" class="form-control" id="bukuID">
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_peminjaman" class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
                        <div class="col-sm-10">
                          <input type="date" name="tanggal_peminjaman" class="form-control" id="tanggal_peminjaman">
                        </div>
                      </div>
                    <div class="row mb-3">
                        <label for="tanggal_pengembalian" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                        <div class="col-sm-10">
                          <input type="date" name="tanggal_pengembalian" class="form-control" id="tanggal_pengembalian">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label>Status Peminjaman : </label>
                        <div id="status_peminjaman" class="btn-group" data-toggle="buttons">
                            @foreach ($ar_status as $label => $st)
                            @php
                            $cek = (old('statuspengembalian') ==  $st) ? 'checked' : '';
                            $css = ($st ==  'Meminjam') ? 'secondary' : 'primary'; 
                            @endphp
                            <label class="btn btn-{{ $css }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" {{ $cek }}  class="flat @error ('status_peminjaman') is-invalid @enderror" name="status_peminjaman" value="{{ $st }}"/>&nbsp; {{ $label }}
                            </label>
                            @endforeach
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>