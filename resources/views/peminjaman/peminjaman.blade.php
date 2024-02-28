@extends(Auth::user()->role === 'admin' ? 'layout.main' : 'layout.main2')

@section('container')

<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Peminjaman</h3>
              </div>
              <!-- /.card-header -->
              <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 20px;">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a class="btn btn-success" href="{{ route('peminjaman.create') }}">
                      <i class="fas fa-plus"></i> Tambah
                    </a>
                  </div>
                <div class="btn-group" role="group" aria-label="Second group">
                    <a class="btn btn-info" href="{{ route('peminjaman.peminjamanpdf') }}">
                      <i class="fas fa-download"></i> Unduh Data
                    </a>
                </div>
                <div class="col-md-4" > <!-- Bagian ini mengambil setengah lebar kolom untuk mengatur tata letak elemen -->
                  <form action="{{ route('peminjaman.search') }}" method="GET">
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
                        <th>User ID</th>
                        <th>Kode Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Pilihan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp
                    <tr>
                      @foreach ($peminjaman as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->userID }}</td>
                        <td>{{ $item->bukuID }}</td>
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                        <td>{{ $item->status_peminjaman }}</td>
                      <td>
                        <div style="display: flex; justify-content: space-between;">
                          <a class="btn btn-warning text-dark" href="{{ route('peminjaman.edit', $item->id) }}" role="button" style="margin-right: 20px;">
                              <i class="fas fa-edit"></i> Edit
                          </a>
                          <form action="{{ route('peminjaman.destroy', $item->id) }}" method="post" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
                        <th>User ID</th>
                        <th>Buku ID</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Pilihan</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              {{ $peminjaman->links() }}
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