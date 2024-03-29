@extends('layout.main')

@section('container')

@php

    $petugas = App\Models\User::where('role', 'petugas')->get();
    $peminjam = App\Models\User::where('role', 'peminjam')->get();
    $buku = App\Models\Buku::all();

    $jml_petugas=0;
    $jml_peminjam=0;
    $jml_buku=0;

@endphp

@foreach ($petugas as $g)
    @php
        $jml_petugas++;
    @endphp
@endforeach

@foreach ($peminjam as $m)
    @php
        $jml_peminjam++;
    @endphp
@endforeach

@foreach ($buku as $b)
    @php
        $jml_buku++;
    @endphp
@endforeach

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jml_buku }}</h3>

                            <p>Jumlah Buku</p>
                        </div>
                        <a href="{{url('/buku')}}" class="icon">
                            <i class="fa fa-book"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $jml_peminjam }}</h3>

                            <p>Jumlah Peminjam</p>
                        </div>
                        <a href="{{url('/peminjaman')}}" class="icon">
                            <i class="nav-icon fas fa-book-reader"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $jml_petugas }}</h3>

                            <p>Jumlah Akun Petugas</p>
                        </div>
                        <a href="{{url('/petugas')}}" class="icon">
                            <i class="ion ion-person-add"></i>
                        </a >
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
