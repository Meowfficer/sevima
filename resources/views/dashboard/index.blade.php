@extends('layouts.app')

@section('breadcumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ ($breadcumb ?? '') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">home</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">{{ ($breadcumb ?? '') }}</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @foreach ($kelases as $kelas)
        <div class="col-lg-4">
            <div class="card bg-{{ $kelas->mapelKelas->warna }} text-white-50" onclick="location.href='{{ route('kelas.detail', $kelas->kelas_mapel_id) }}'" style="cursor: pointer">
                <div class="card-body">
                    <div class="d-flex d-inline-block">
                        <h5 class="mb-4 text-white"><i class="mdi mdi-bullseye-arrow me-3"></i> {{ $kelas->mapelKelas->nama_kelas }}</h5><h5><i class="bx bx-dots-vertical me-auto"></i></h5>
                    </div>
                    <p class="card-text">{{ $kelas->mapelKelas->deskripsi }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection