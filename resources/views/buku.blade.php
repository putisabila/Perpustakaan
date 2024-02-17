@extends('layout.main')

@section('container')
<div class="content-wrapper">
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with minimal features & hover style</h3>
          </div>
          <!-- /.card-header -->
          <a class="btn btn-primary mb-3" href="{{route('buku.create')}}">Tambah +</a>
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Penerbit</th>
                  <th>Tahun Terbit</th>
                  <th>Pilihan</th>
                </tr>
              </thead>
              <tbody>
                @php
                $no = 1;
                @endphp
                <tr>
                  @foreach ($buku as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->judul }}</td>
                  <td>{{ $item->penulis }}</td>
                  <td>{{ $item->penerbit }}</td>
                  <td>{{ $item->tahun_terbit }}</td>
                  <td>
                    <div style="display: flex; justify-content: space-between;">
                      <a class="btn btn-light" href="{{ route('buku.edit', $item->id) }}" role="button" style="margin-right: -5px;">Edit</a>
                      <form action="{{ route('buku.destroy', $item->id) }}" method="get" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                        @csrf
                        @method('post')
                        <button type="submit" class="btn btn-danger" style="margin-left: -60px;">Hapus</button>
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
                  <th>Pilihan</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
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