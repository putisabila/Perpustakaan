@extends('layout.main2')

@section('container')

@php

    $peminjam = App\Models\User::where('role', 'peminjam')->get();
    $buku = App\Models\Buku::all();

    $jml_peminjam=0;
    $jml_buku=0;

@endphp

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
