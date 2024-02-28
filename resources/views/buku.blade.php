@extends(Auth::check() && Auth::user()->role === 'admin' ? 'layout.main' : (Auth::check() && Auth::user()->role === 'petugas' ? 'layout.main2' : 'layout2.main'))

@section('container')
<div class="content-wrapper">
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Buku</h3>
          </div>
          <!-- /.card-header -->
          
          <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 20px;">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <a class="btn btn-success" href="{{ route('buku.create') }}">
                  <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
            <div class="btn-group" role="group" aria-label="Second group">
                <a class="btn btn-info" href="{{ route('buku.bukupdf') }}">
                  <i class="fas fa-download"></i> Unduh Data
                </a>
            </div>
            <div class="col-md-4" > <!-- Bagian ini mengambil setengah lebar kolom untuk mengatur tata letak elemen -->
              <form action="{{ route('buku.search') }}" method="GET">
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search.." name="search">
                      <button class="btn btn-primary" type="submit">Search</button>
                  </div>
              </form>
          </div>
        </div>
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Kode Buku</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Penerbit</th>
                  <th>Tahun Terbit</th>
                  <th>Stok Buku</th>
                  <th>Pilihan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach ($buku as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->judul }}</td>
                  <td>{{ $item->penulis }}</td>
                  <td>{{ $item->penerbit }}</td>
                  <td>{{ $item->tahun_terbit }}</td>
                  <td>{{ $item->stok }}</td>
                  <td>
                    <div style="display: flex; justify-content: space-between;">
                      <a class="btn btn-warning text-dark" href="{{ route('buku.edit', $item->id) }}" role="button" style="margin-right: 10px;">
                          <i class="fas fa-edit"></i> Edit
                      </a>
                      <form action="{{ route('buku.destroy', $item->id) }}" method="post" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" style="margin-left: -20px;">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                  </div>                  
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Penerbit</th>
                  <th>Tahun Terbit</th>
                  <th>Stok Buku</th>
                  <th>Pilihan</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
          {{ $buku->links() }}
        </div>
        </div>
        <!-- /.card -->
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
</div>
@endsection