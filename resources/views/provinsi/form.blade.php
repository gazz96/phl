@extends('layouts')


@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Form {{$singular}}</h1>
        @php 
        $url = $provinsi->id ? route("{$slug}.update", $provinsi) :  route("{$slug}.store");
        @endphp
        <form action="{{$url}}" method="POST">
            @csrf
            @if($provinsi->id)
            @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="i-nama">Nama</label>
                                <input name="nama" type="text" class="form-control form-control-lg" id="i-nama" value="{{old('nama', $provinsi->nama)}}">
                                @error('nama')
                                    <span class="d-block invalid-feedback"></span>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center justify-content-end">
                                <a href="{{route( $slug . '.index')}}" class="btn btn-lg btn-outline-secondary me-2">Kembali</a>
                                <button class="btn btn-primary btn-lg">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
