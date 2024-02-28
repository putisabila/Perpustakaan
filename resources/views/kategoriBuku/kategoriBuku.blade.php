@extends(Auth::user()->role === 'admin' ? 'layout.main' : 'layout.main2')

@section('container')

<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kategori Buku</h3>
              </div>
              <!-- /.card-header -->
              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 20px;">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a class="btn btn-success" href="{{ route('kategoribuku.create') }}">
                      <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="btn-group" role="group" aria-label="Second group">
                    <a class="btn btn-info" href="{{ route('kategoribuku.kategoribukupdf') }}">
                      <i class="fas fa-download"></i> Unduh Data
                    </a>
                </div>
                <div class="col-md-4" > <!-- Bagian ini mengambil setengah lebar kolom untuk mengatur tata letak elemen -->
                  <form action="{{ route('kategoribuku.search') }}" method="GET">
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
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Pilihan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp
                    <tr>
                      @foreach ($kategoriBuku as $item)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $item->nama_kategori }}</td>
                      <td>
                        <div style="display: flex; justify-content: space-between;">
                          <a class="btn btn-warning text-dark" href="{{ route('kategoribuku.edit', $item->id) }}" role="button" style="margin-right: -50px;">
                              <i class="fas fa-edit"></i> Edit
                          </a>
                          <form action="{{ route('kategoribuku.destroy', $item->id) }}" method="post" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" style="margin-left: -60px;">
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
                      <th>Nama Kategori</th>
                      <th>Pilihan</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              {{ $kategoriBuku->links() }}
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