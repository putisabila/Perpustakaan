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
    <h1 style="display:flex; justify-content : center;" class="fst-italic mb-5">Data Ulasan Buku</h1>

    <div class="container">
        <a class="btn btn-primary mb-3" href="{{route('ulasanbuku.create')}}">Tambah +</a>
    </div>

    <div class="container">
        <div class="row">
          <table class="table table-dark table-striped">
            <tr>
                <th>No.</th>
                <th>UserID</th>
                <th>BukuID</th>
                <th>Penerbit</th>
                <th>Ulasan</th>
                <th>Rating</th>
            </tr>
            @php
                $no = 1;
            @endphp
            
            @foreach ($ulasanBuku as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->userID }}</td>
                    <td>{{ $item->bukuID }}</td>
                    <td>{{ $item->ulasan }}</td>
                    <td>{{ $item->rating }}</td>
                    <td>
                        <div style="display: flex; justify-content: space-between;">  
                            <a class="btn btn-light" href="{{ route('ulasanbuku.edit', $item->ulasanID) }}" role="button" style="margin-right: -5px;">Edit</a>
                              <form action="{{ route('ulasanbuku.destroy', $item->ulasanID) }}" method="get" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                              @csrf
                              @method('post')
                              <button type="submit" class="btn btn-danger"  style="margin-left: -60px;">Hapus</button>
                              </form>
                        </div>
                    </td>
                </tr>
            @endforeach

          </table>
        </div>
    </div>
</body>
</html>