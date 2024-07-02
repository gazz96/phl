@extends('layouts')


@section('content')

<div class="row">
    <div class="container-fluid p-0">

        <div class="d-flex align-items-center mb-3">
            <a href="{{route('anggota.index')}}" class="btn btn-outline-secondary me-3">
                <span class="fas fa-chevron-left"></span>
                Kembali
            </a>
            <h1 class="h3 mb-0">Detail PHL</h1>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                @if($anggota->foto)
                <img src="{{url('uploads/' . $anggota->foto)}}" alt="{{$anggota->nama}}" class="img-fluid">
                @endif 
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h3>{{$anggota->nama}}</h3>
                        <p class="mb-3">TENAGA NON ASN {{$anggota->status}} / {{ $anggota->nik }}</p>
                        <p class="mb-3">PHL {{$anggota->satuan_kerja->jenis}} {{$anggota->satuan_kerja->nama ?? '-'}} POLDA SUMUT</p>
                        <p class="mb-3">Tempat, Tanggal Lahir: {{$anggota->tempat_lahir}}, {{$anggota->tanggal_lahir}}</p>
                        <p class="mb-3">Agama: {{$anggota->agama}}</p>
                        <p class="mb-3">Suku: {{$anggota->suku}}</p>
                        <p class="mb-3">No. Handphone: {{$anggota->hp}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">PENDIDIKAN UMUM</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm table-borderd">
                            <thead>
                                <tr>
                                    <th>TINGKAT</th>
                                    <th>INSTITUSI</th>
                                    <th>TAHUN</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($anggota->pendidikan as $pendidikan)
                                <tr>
                                    <td>{{$pendidikan->tingkat}}</td>
                                    <td>{{$pendidikan->institusi}}</td>
                                    <td>{{date('Y', strtotime($pendidikan->tanggal_lulus))}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">RIWAYAT JABATAN</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm table-borderd">
                            <thead>
                                <tr>
                                    <th>JABATAN</th>
                                    <th>TAMAT</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($anggota->jabatan as $jabatan)
                                <tr>
                                    <td>{{$jabatan->nama}}</td>
                                    <td>{{$jabatan->tamat_jabatan}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection