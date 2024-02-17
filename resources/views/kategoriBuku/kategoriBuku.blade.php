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
    <h1 style="display:flex; justify-content : center;" class="fst-italic mb-5">Data Kategori Buku</h1>

    <div class="container">
        <a class="btn btn-primary mb-3" href="{{route('kategoribuku.create')}}">Tambah +</a>
    </div>

    <div class="container">
        <div class="row">
          <table class="table table-dark table-striped">
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
                <th>Pilihan</th>
            </tr>
            @php
                $no = 1;
            @endphp
            
            @foreach ($kategoriBuku as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>
                        <div style="display: flex; justify-content: space-between;">  
                            <a class="btn btn-light" href="{{ route('kategoribuku.edit', $item->id) }}" role="button" style="margin-right: -5px;">Edit</a>
                              <form action="{{ route('kategoribuku.destroy', $item->id) }}" method="get" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                              @csrf
                              @method('post')
                              <button type="submit" class="btn btn-danger"  style="margin-left: -230px;">Hapus</button>
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