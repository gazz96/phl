@extends('layouts')


@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Form {{$singular}}</h1>
        @php 
        $url = $model->id ? route("{$slug}.update", $model->id) :  route("{$slug}.store");
        @endphp
        <form action="{{$url}}" method="POST">
            @csrf
            @if($model->id)
            @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="i-provinsi_id">Provinsi</label>
                                <select name="provinsi_id" class="form-control form-control-lg" id="i-provinsi_id">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($koleksi_provinsi as $provinsi)
                                        <option value="{{$provinsi->id}}" {{ $provinsi->id == $model->provinsi_id ? 'selected' : ''}}>{{$provinsi->nama}}</option>
                                    @endforeach
                                </select>
                                @error('provinsi_id')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="i-nama">Nama</label>
                                <input name="nama" type="text" class="form-control form-control-lg" id="i-nama" value="{{old('nama', $model->nama)}}">
                                @error('nama')
                                    <span class="d-block invalid-feedback">{{!nessage}}</span>
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
