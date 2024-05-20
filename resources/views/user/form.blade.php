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

                    @if($status = session('status'))
                    <div class="alert alert-{{$status}} alert-dismissible" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div class="alert-message">
                            {{session('message')}}
                        </div>
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="i-satuan_kerja_id">Satuan Kerja</label>
                                <select name="satuan_kerja_id" class="form-control form-control-lg" id="i-satuan_kerja_id">
                                    <option value="">Pilih Satuan kerja</option>
                                    @foreach($koleksi_satuan_kerja as $satuan_kerja)
                                    <option value="{{$satuan_kerja->id}}" {{$satuan_kerja->id == $model->satuan_kerja_id ? 'selected' : ''}}>
                                        {{$satuan_kerja->jenis}} {{$satuan_kerja->nama}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('satuan_kerja_id')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="i-nama">Nama</label>
                               <input name="nama" type="text" class="form-control form-control-lg" id="i-nama" value="{{old('nama', $model->nama)}}">
                                @error('nama')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="i-email">Email</label>
                               <input name="email" type="text" class="form-control form-control-lg" id="i-email" value="{{old('nama', $model->email)}}">
                                @error('email')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="i-password">Password</label>
                               <input name="password" type="password" class="form-control form-control-lg" id="i-password">
                                @error('password')
                                    <span class="d-block invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center justify-content-end">
                                <a href="{{route("{$slug}.index")}}" class="btn btn-lg btn-outline-secondary me-2">Kembali</a>
                                <button class="btn btn-primary btn-lg">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
