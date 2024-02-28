@extends('layout.main')

@section('container')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Petugas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 20px;">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <a class="btn btn-success" href="{{ route('petugas.create') }}">
                                  <i class="fas fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($users->isEmpty())
                                <p>Tidak ada petugas.</p>
                            @else
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->alamat }}</td>
                                                <td>
                                                    <div style="display: flex; justify-content: space-between;">
                                                        <a class="btn btn-warning text-dark" href="{{ route('petugas.edit', $user->id) }}" role="button" style="margin-right: 10px;">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('petugas.destroy', $user->id) }}" method="post" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
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
