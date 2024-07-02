@extends('layouts')


@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex align-items-center mb-3">
                <a href="{{route('anggota.index')}}" class="btn btn-outline-secondary me-3">
                    <span class="fas fa-chevron-left"></span>
                    Kembali
                </a>
            <h1 class="h3 mb-0">Form {{ $singular }}</h1>
        </div>
        @php
            $url = $model->id ? route("{$slug}.update", $model->id) : route("{$slug}.store");
        @endphp
        <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($model->id)
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-12">


                    @if ($status = session('status'))
                        <div class="alert alert-{{ $status }} alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-message">
                                {{ session('message') }}
                            </div>
                        </div>
                    @endif


                    <div class="tab tab-vertical">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="#colored-vertical-icon-tab-1" data-bs-toggle="tab"
                                    role="tab" aria-selected="true">
                                    <i data-lucide="user"></i>
                                    Data Pribadi
                                </a>
                            </li>

                            @if($model->id)



                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="#colored-vertical-icon-tab-2" data-bs-toggle="tab"
                                    role="tab" aria-selected="true">
                                    <i data-lucide="award"></i>
                                    Jabatan
                                </a>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="#colored-vertical-icon-tab-3" data-bs-toggle="tab"
                                    role="tab" aria-selected="true">
                                    <i data-lucide="git-branch"></i>
                                    Keluarga
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="#colored-vertical-icon-tab-4" data-bs-toggle="tab"
                                    role="tab" aria-selected="true">
                                    <i data-lucide="tag"></i>
                                    Pendidikan
                                </a>
                            </li>

                            @endif

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="colored-vertical-icon-tab-1" role="tabpanel">
                                <div class="">

                                    <div class="mb-3">
                                        <label for="i-fot">Foto</label>
                                        <input type="file" name="foto" class="form-control mb-2">

                                        @if($model->file_paspor)
                                        <img src="{{url('uploads/' . $model->foto)}}" alt="{{$model->nama}}" class="img-fluid">
                                        @endif

                                        
                                        @error('foto')
                                            <span class="d-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="i-status">Status</label>
                                            <select name="status" id="i-status" class="form-control form-control-lg">
                                                @foreach(['K2', 'NON K2'] as $status)
                                                <option value="{{$status}}" {{ $status == old('status', $model->status) ? 'selected' : '' }}>{{$status}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="i-nomor_keanggotaan">Nomor K2</label>
                                            <input name="nomor_keanggotaan" type="text" class="form-control form-control-lg" id="i-nomor_keanggotaan" value="{{ old('nomor_keanggotaan', $model->nomor_keanggotaan)}}">
                                        </div>
                                    </div>

                                    @if(auth()->user()->role_id == 1)
                                    <div class="mb-3">
                                        <label for="i-satuan_kerja_id">Satuan Kerja</label>
                                        <select name="satuan_kerja_id" class="form-control form-control-lg" id="i-satuan_kerja_id">
                                            @foreach ($koleksi_satuan_kerja as $satuan_kerja)
        
                                                <option value="{{ $satuan_kerja->id }}"
                                                    {{ $satuan_kerja->id == $model->satuan_kerja_id ? 'selected' : '' }}>
                                                    {{ $satuan_kerja->jenis }} {{ $satuan_kerja->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('satuan_kerja_id')
                                            <span class="d-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @else 
                                    <div class="mb-3">
                                        <label for="i-satuan_kerja_id">Satuan Kerja</label>
                                        <select name="satuan_kerja_id" class="form-control form-control-lg" id="i-satuan_kerja_id">
                                            <option value="">Pilih Satuan kerja</option>
                                            @foreach ($koleksi_satuan_kerja as $satuan_kerja)
        
                                                <option value="{{ $satuan_kerja->id }}"
                                                    {{ $satuan_kerja->id == $model->satuan_kerja_id ? 'selected' : '' }}>
                                                    {{ $satuan_kerja->jenis }} {{ $satuan_kerja->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('satuan_kerja_id')
                                            <span class="d-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @endif

                                    {{-- <div class="mb-3">
                                        <label for="i-nik">NIK</label>
                                        <input name="nik" type="text" class="form-control form-control-lg" id="i-nik"
                                            value="{{ old('nik', $model->nik) }}">
                                        @error('nik')
                                            <span class="d-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div> --}}
        
        
                                    <div class="mb-3">
                                        <label for="i-nama">Nama</label>
                                        <input name="nama" type="text" class="form-control form-control-lg" id="i-nama"
                                            value="{{ old('nama', $model->nama) }}">
                                        @error('nama')
                                            <span class="d-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="i-email">Email</label>
                                        <input name="email" type="text" class="form-control form-control-lg" id="i-email"
                                            value="{{ old('nama', $model->email) }}">
                                        @error('email')
                                            <span class="d-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="i-nama_panggilan">Nama Panggilan</label>
                                        <input name="nama_panggilan" type="text" class="form-control form-control-lg"
                                            id="i-nama_panggilan" value="{{ old('nama_panggilan', $model->nama_panggilan) }}">
                                        @error('nama_panggilan')
                                            <span class="d-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
        
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="i-tempat_lahir">Tempat Lahir</label>
                                            <input name="tempat_lahir" type="text" class="form-control form-control-lg"
                                                id="i-tempat_lahir" value="{{ old('tempat_lahir', $model->tempat_lahir) }}">
                                            @error('tempat_lahir')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-tanggal_lahir">Tanggal Lahir</label>
                                            <input name="tanggal_lahir" type="date" class="form-control form-control-lg"
                                                id="i-tanggal_lahir" value="{{ old('tanggal_lahir', $model->tanggal_lahir) }}">
                                            @error('tanggal_lahir')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="mb-3 col">
                                            <label for="i-jenis_kelamin">Jenis kelamin</label>
                                            <select name="jenis_kelamin" type="date" class="form-control form-control-lg"
                                                id="i-jenis_kelamin">
                                                @foreach (['Pria', 'Wanita'] as $index => $jenis_kelamin)
                                                    <option value="{{ $index }}"
                                                        {{ $index === $model->jenis_kelamin ? 'selected' : '' }}>{{ $jenis_kelamin }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-jenis_rambut">Jenis Rambut</label>
                                            <select name="jenis_rambut" type="date" class="form-control form-control-lg"
                                                id="i-jenis_rambut">
                                                @foreach (['Lurus', 'Bergelombang', 'Ikal', 'Keriting'] as $index => $jenis_rambut)
                                                    <option value="{{ $jenis_rambut }}"
                                                        {{ $jenis_rambut === $model->jenis_rambut ? 'selected' : '' }}>{{ $jenis_rambut }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="i-status_pernikahan">Status Pernikahan</label>
                                            <select name="status_pernikahan" type="date" class="form-control form-control-lg"
                                                id="i-status_pernikahan">
                                                @foreach (['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'] as $index => $status_pernikahan)
                                                    <option value="{{ $status_pernikahan }}"
                                                        {{ $status_pernikahan === $model->status_pernikahan ? 'selected' : '' }}>
                                                        {{ $status_pernikahan }}</option>
                                                @endforeach
                                            </select>
                                            @error('status_pernikahan')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-warna_mata">Warna Mata</label>
                                            <select name="warna_mata" class="form-control form-control-lg"
                                                id="i-warna_mata">
                                                @foreach (['Hitam', 'Cokelat', 'Biru', 'Hijau', 'Merah Mudah'] as $index => $warna_mata)
                                                    <option value="{{ $warna_mata }}"
                                                        {{ $warna_mata == $model->warna_mata ? 'selected' : '' }}>{{ $warna_mata }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('warna_mata')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="i-suku">Suku</label>
                                            <input name="suku" type="text" class="form-control form-control-lg" id="i-suku"
                                                value="{{ old('suku', $model->suku) }}">
                                            @error('suku')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-warna_kulit">Warna Kulit</label>
                                            <select name="warna_kulit" type="date" class="form-control form-control-lg"
                                                id="i-warna_kulit">
                                                @foreach (['Putih', 'Sawo Matang', 'Gelap', 'Kuning Langsat', 'Cokelat'] as $index => $warna_kulit)
                                                    <option value="{{ $warna_kulit }}"
                                                        {{ $warna_kulit === $model->warna_kulit ? 'selected' : '' }}>{{ $warna_kulit }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('warna_kulit')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="i-warna_rambut">Warna Rambut</label>
                                        <select name="warna_rambut" type="date" class="form-control form-control-lg"
                                            id="i-warna_rambut">
                                            @foreach (['Putih', 'Hitam', 'Cokelat', 'Merah'] as $index => $warna_rambut)
                                                <option value="{{ $warna_rambut }}"
                                                    {{ $warna_rambut === $model->warna_rambut ? 'selected' : '' }}>{{ $warna_rambut }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('warna_kulit')
                                            <span class="d-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
        
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="i-anak_ke">Anak Ke</label>
                                            <input name="anak_ke" type="number" class="form-control form-control-lg"
                                                id="i-anak_ke" value="{{ old('anak_ke', $model->anak_ke) }}">
                                            @error('anak_ke')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col mb-3">
                                            <label for="i-anak_dari">Dari</label>
                                            <input name="anak_dari" type="number" class="form-control form-control-lg"
                                                id="i-anak_dari" value="{{ old('anak_dari', $model->anak_dari) }}">
                                            @error('anak_dari')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="i-agama">Agama</label>
                                        <select name="agama" type="date" class="form-control form-control-lg"
                                            id="i-agama">
                                            @foreach (['Islam', 'Katolik', 'Protestan', 'Budha', 'Hindu', 'Konghucu'] as $index => $agama)
                                                <option value="{{ $agama }}"
                                                    {{ $index === $model->agama ? 'selected' : '' }}>{{ $agama }}</option>
                                            @endforeach
                                        </select>
                                        @error('agama')
                                            <span class="d-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="i-alamat">Alamat</label>
                                        <textarea name="alamat" type="text" class="form-control form-control-lg" id="i-alamat" rows="5">{{ old('alamat', $model->alamat) }}</textarea>
                                        @error('alamat')
                                            <span class="d-block invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
        
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="i-tinggi">Tinggi</label>
                                            <input name="tinggi" type="text" class="form-control form-control-lg" id="i-tinggi"
                                                value="{{ old('tinggi', $model->tinggi) }}">
                                            @error('tinggi')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-berat">Berat</label>
                                            <input name="berat" type="text" class="form-control form-control-lg" id="i-berat"
                                                value="{{ old('berat', $model->berat) }}">
                                            @error('berat')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="i-ukuran_sepatu">Ukuran Sepatu</label>
                                            <input name="ukuran_sepatu" type="text" class="form-control form-control-lg" id="i-ukuran_septau"
                                                value="{{ old('ukuran_sepatu', $model->ukuran_sepatu) }}">
                                            @error('ukuran_sepatu')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-ukuran_topi">Ukuran Topi</label>
                                            <input name="ukuran_topi" type="text" class="form-control form-control-lg" id="i-ukuran_topi"
                                                value="{{ old('ukuran_topi', $model->ukuran_topi) }}">
                                            @error('ukuran_topi')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="i-ukuran_celana">Ukuran Celana</label>
                                            <input name="ukuran_celana" type="text" class="form-control form-control-lg" id="i-ukuran_celana"
                                                value="{{ old('ukuran_celana', $model->ukuran_celana) }}">
                                            @error('ukuran_celana')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-ukuran_celana">Ukuran Baju</label>
                                            <input name="ukuran_celana" type="text" class="form-control form-control-lg" id="i-ukuran_celana"
                                                value="{{ old('ukuran_celana', $model->ukuran_celana) }}">
                                            @error('ukuran_celana')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
            
                                        <div class="mb-3 col">
                                            <label for="i-sidik_jari_1">Sidik Jari 1</label>
                                            <input name="sidik_jari_1" type="text" class="form-control form-control-lg"
                                                id="i-sidik_jari_1" value="{{ old('sidik_jari_1', $model->sidik_jari_1) }}">
                                            @error('sidik_jari_1')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-sidik_jari_2">Sidik Jari 2</label>
                                            <input name="sidik_jari_2" type="text" class="form-control form-control-lg"
                                                id="i-sidik_jari_2" value="{{ old('sidik_jari_2', $model->sidik_jari_2) }}">
                                            @error('sidik_jari_2')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="i-bpjs">BPJS</label>
                                                <input type="text" name="bpjs" class="form-control form-control" id="i-bpjs" value="{{old('bpjs', $model->bpjs)}}">    
                                                @error('file_bpjs')
                                                    <span class="d-block invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="i-npwp">NPWP</label>
                                                <input type="text" name="npwp" class="form-control form-control-lg" id="i-npwp" value="{{old('npwp', $model->npwp)}}">
                                                @error('npwp')
                                                    <span class="d-block invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="i-nik">NIK (NOMOR INDUK KEPENDUDUKAN)</label>
                                                <input type="text" name="nik" class="form-control form-control-lg" id="i-nik" value="{{old('nik', $model->nik)}}">
                                                @error('nik')
                                                    <span class="d-block invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="i-nomor_kk">NOMOR KARTU KELUARGA</label>
                                                <input type="text" name="nomor_kk" class="form-control form-control-lg" id="i-nomor_kk" value="{{old('nomor_kk', $model->nomor_kk)}}">
                                                @error('nomor_kk')
                                                    <span class="d-block invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="i-file_paspor">PASPOR</label>
                                                <input type="file" name="file_paspor" class="form-control form-control-lg" id="i-file_paspor">
                                                @if($model->file_paspor)
                                                <a href="{{url('uploads/' . $model->file_paspor)}}" target="_blank">LIHAT</a>
                                                @endif
                                                @error('file_paspor')
                                                    <span class="d-block invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="i-file_akta_lahir">AKTA LAHIR</label>
                                                <input type="file" name="file_akta_lahir" class="form-control form-control-lg" id="i-file_akta_lahir">
                                                @if($model->file_akta_lahir)
                                                <a href="{{url('uploads/' . $model->file_akta_lahir)}}" target="_blank">LIHAT</a>
                                                @endif

                                                @error('file_akta_lahir')
                                                    <span class="d-block invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                    </div>
        
        
        
        
                                    <div class="d-flex align-items-center justify-content-end">
                                        <a href="{{ route("{$slug}.index") }}"
                                            class="btn btn-lg btn-outline-secondary me-2">Kembali</a>
                                        <button class="btn btn-primary btn-lg">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="colored-vertical-icon-tab-2" role="tabpanel">
                                <a href="#modal-jabatan" class="btn btn-primary mb-3 btn-trigger_form_jabatan" data-bs-toggle="modal">Tambah Jabatan</a>
                                <table class="table table-bordered" id="table-jabatan">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No. SPRIN Awal</th>
                                            <th>TMT Jabatan</th>
                                            <th>File SPRIN Awal</th>
                                            <th>Satuan Kerja</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center">Data tidak ada</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="colored-vertical-icon-tab-3" role="tabpanel">
                                <a href="#modal-keluarga" class="btn btn-primary mb-3 btn-trigger_form_keluarga" data-bs-toggle="modal">Tambah Keluarga</a>
                                <table class="table table-bordered" id="table-keluarga">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Hubungan Keluarga</th>
                                            <th>Status</th>
                                            <th>Pekerjaan</th>
                                            <th>File Buku Nikah</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="7" class="text-center">Data tidak ada</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="colored-vertical-icon-tab-4">
                                <a href="#modal-pendidikan" class="btn btn-primary mb-3 btn-trigger_modal_pendidikan" data-bs-toggle="modal">Tambah Pendidikan</a>
                                <table class="table table-bordered" id="table-pendidikan">
                                    <thead>
                                        <tr>
                                            <th>Tingkat</th>
                                            <th>Nama Sekolah</th>
                                            <th>Tanggal Lulus</th>
                                            <th>Jurusan</th>
                                            <th>Nomor Ijazah</th>
                                            <th>File</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center">Data tidak ada</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div>
        </form>

    </div>

  
  <!-- Modal Jabatan-->
  <div class="modal fade" id="modal-jabatan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Jabatan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('jabatan-anggota')}}" method="POST" id="form-jabatan">
                <input type="hidden" name="anggota_id" value="{{$model->id}}">
                <input type="hidden" name="id" id="i-jabatan_id">
                <div class="mb-3">
                    <label for="">JABATAN</label>
                    <input type="text" name="nama" id="i-nama_jabatan" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label for="">NO. SPRIN AWAL</label>
                    <input type="text" name="no_sprin_awal" id="i-no_sprin_awal_jabatan" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label for="">FILE SPRIN AWAL</label>
                    <input name="file" type="file" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="i-tamat_jabatan">TMT. JABATAN</label>
                    <input type="text" name="tamat_jabatan" id="i-tmt_jabatan" class="form-control form-control-lg">
                </div>


                <div class="mb-3">
                    <label for="i-satuan_kerja_id_jabatan">Satuan Kerja</label>
                    <select name="satuan_kerja_id" class="form-control form-control-lg" id="i-satuan_kerja_id_jabatan">
                        <option value="">Pilih Satuan kerja</option>
                        @foreach ($koleksi_satuan_kerja as $satuan_kerja)
                            <option value="{{ $satuan_kerja->id }}"
                                {{ $satuan_kerja->id == $model->satuan_kerja_id ? 'selected' : '' }}>
                                {{ $satuan_kerja->jenis }} {{ $satuan_kerja->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('satuan_kerja_id')
                        <span class="d-block invalid-feedback">{{ $message }}</span>
                    @enderror


                </div>

                <button type="button" class="btn btn-primary" id="btn-save_jabatan">Simpan</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Keluarga-->
  <div class="modal fade" id="modal-keluarga" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Keluarga</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('keluarga-anggota')}}" method="POST" id="form-keluarga">

                <input type="hidden" name="anggota_id" value="{{$model->id}}">
                <input type="hidden" name="id" id="i-keluarga_id">
                <div class="mb-3">
                    <label for="">NAMA</label>
                    <input type="text" name="nama" id="i-nama_keluarga" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label for="i-jenis_kelamin">JENIS KELAMIN</label>
                    <select name="jenis_kelamin" type="date" class="form-control form-control-lg"
                        id="i-jenis_kelamin">
                        @foreach (['Pria', 'Wanita'] as $index => $jenis_kelamin)
                            <option value="{{ $jenis_kelamin }}">{{ $jenis_kelamin }}
                            </option>
                        @endforeach
                    </select>
                    @error('jenis_kelamin')
                        <span class="d-block invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="i-tamat_jabatan">HUBUNGAN KELUARGA</label>
                    <input type="text" name="hubungan_keluarga" id="i-tmt_jabatan" class="form-control form-control-lg">
                </div>


                <div class="mb-3">
                    <label for="i-status_keluarga">STATUS</label>
                    <select name="status" class="form-control form-control-lg"
                        id="i-status_keluarga">
                        @foreach (['Hidup', 'Mati'] as $index => $status)
                            <option value="{{ $status }}">{{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="i-pekerjaan">PEKERJAAN</label>
                    <input type="text" name="pekerjaan" id="i-tmt_jabatan" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label for="i-file_buku_nikah">FILE BUKU NIKAH</label>
                    <input type="file" name="file_buku_nikah" class="form-control">
                </div>

                <div class="mb-3">
                    <label>TEMPAT LAHIR</label>
                    <input type="text" name="tempat_lahir" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label>TANGGAL LAHIR</label>
                    <input type="date" name="tanggal_lahir" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label>NO. TELEPON</label>
                    <input type="text" name="telp" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label>ALAMAT</label>
                    <textarea name="alamat" class="form-control form-control-lg"></textarea>
                </div>


                <button type="button" class="btn btn-primary" id="btn-save_keluarga">Simpan</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  

    <!-- Modal Pendidikan-->
    <div class="modal fade" id="modal-pendidikan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Pendidikan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('pendidikan-anggota')}}" method="POST" id="form-pendidikan">
    
                    <input type="hidden" name="anggota_id" value="{{$model->id}}">
                    <input type="hidden" name="id" id="i-pendidikan_id">
                    
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="">TINGKAT</label>
                            <input type="text" name="tingkat" id="i-tingkat_pendidikan" class="form-control form-control-lg">
                        </div>

                        <div class="mb-3 col">
                            <label for="">NAMA SEKOLAH</label>
                            <input type="text" name="institusi" class="form-control form-control-lg">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="">AKREDITASI</label>
                        <input type="text" name="akreditasi" class="form-control form-control-lg">
                    </div>

                    <div class="mb-3">
                        <label for="">FILE AKREDITASI</label>
                        <input type="file" name="file_akreditasi" class="form-control form-control-lg">
                    </div>
    
                    <div class="mb-3">
                        <label for="">TANGGAL MULAI PENDIDIKAN</label>
                        <input type="date" name="tanggal_mulai_pendidikan" class="form-control form-control-lg">
                    </div>

                    <div class="mb-3">
                        <label for="">TANGGAL LULUS PENDIDIKAN</label>
                        <input type="date" name="tanggal_lulus" class="form-control form-control-lg">
                    </div>

                    <div class="mb-3">
                        <label for="">JURUSAN</label>
                        <input type="text" name="jurusan" class="form-control form-control-lg">
                    </div>

                    <div class="mb-3">
                        <label for="">NOMOR IJAZAH</label>
                        <input type="text" name="nomor_ijazah" class="form-control form-control-lg">
                    </div>

                    <div class="mb-3">
                        <label for="">FILE IJAZAH</label>
                        <input type="file" name="file_ijazah" class="form-control form-control-lg">
                    </div>

                    <div class="mb-3">
                        <label for="">TRANSKRIP NILAI</label>
                        <input type="text" name="transkrip_nilai" class="form-control form-control-lg">
                    </div>

                    <div class="mb-3">
                        <label for="">FILE TRANSKRIP NILAI</label>
                        <input type="file" name="file_transkrip_nilai" class="form-control form-control-lg">
                    </div>
    
                    <div class="mb-3">
                        <label>TAMPILKAN GELAR</label>
                        <select name="tampilkan_gelar" class="form-control form-control-lg">
                            @foreach (['Ya', 'Tidak'] as $index => $status)
                                <option value="{{ $status }}">{{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    
    
                    <button type="button" class="btn btn-primary" id="btn-save_pendidikan">Simpan</button>
                </form>
            </div>
          </div>
        </div>
      </div>
      


@endsection


@section('footer')

<script>

    const JabatanAnggota = {
        Models: {
            index: async() => {
                return await $.ajax({
                    url: '{{route('jabatan-anggota')}}?anggota_id={{$model->id}}',
                })
            },
            save: async(data) => {
                return await $.ajax({
                    method: 'POST',
                    url: '{{route('jabatan-anggota.save')}}',
                    data: data
                })
            },
            
            delete: async(id) => {
                return await $.ajax({
                    method: 'POST',
                    url: '{{route('jabatan-anggota.delete')}}',
                    data: {
                        id: id
                    }
                })
            },
            upload: async(data) => {
                return await $.ajax({
                    method: 'POST',
                    url: '{{route('jabatan-anggota.upload')}}',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data
                })
            }
        },
        Views: {
            row: (row) =>  {

                let fileSprinAwal = "";

                if(row.file) {
                    fileSprinAwal = `<div><a href='${UPLOAD_URL  + '/' + row.file}' target='_blank'>LIHAT</a></div>`
                }

                return `
                <tr>
                    <td>${row.nama}</td>
                    <td>${row.no_sprin_awal}</td>
                    <td>${row.tamat_jabatan}</td>
                    <td>${fileSprinAwal}</td>
                    <td>${row.satuan_kerja.nama}</td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-warning btn-edit" onclick="JabatanAnggota.Helpers.setForm({
                            id: '${row.id}',
                            nama: '${row.nama}',
                            satuan_kerja_id: '${row.satuan_kerja_id}',
                            no_sprin_awal: '${row.no_sprin_awal}',
                            anggota_id: '${row.anggota_id}',
                            tamat_jabatan: '${row.tamat_jabatan}'
                        })">
                            <span class="fas fa-pencil">
                        </a>
                        <a href="javascript:void(0)" data-id="${row.id}" class="btn btn-danger btn-delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                `
            },
            renderTable: async(data) => {
                try {
                    $('#table-jabatan').find('tbody').empty();
                    const response = await JabatanAnggota.Models.index();
                    console.log('response', response)
                    response.map((row, index) => {
                        console.log('row', row)
                        $('#table-jabatan').find('tbody').append(
                            JabatanAnggota.Views.row(row)
                        );
                    })
                }
                catch(error) {

                }
                finally {

                }
                
            }
        },
        Helpers: {
            resetForm: () => {
                $('#form-jabatan')[0].reset();
            },
            setForm: (data) =>  {
                const form = $('#form-jabatan')
                form.find('[name=anggota_id]').val(data.anggota_id);
                form.find('[name=nama]').val(data.nama);
                form.find('[name=id]').val(data.id);
                form.find('[name=no_sprin_awal]').val(data.no_sprin_awal);
                form.find('[name=satuan_kerja_id]').val(data.satuan_kerja_id);
                form.find('[name=tamat_jabatan]').val(data.tamat_jabatan);
                $('#modal-jabatan').modal('show');
            },
            init: () => {
                $(document).on('click', '#btn-save_jabatan', async function(e){
                    e.preventDefault();
                    try {
                        const data = $('#form-jabatan').serialize();
                        console.log('data', data);
                        const response = await JabatanAnggota.Models.save(data)

                        var formData = new FormData();
                        formData.append('id', response.id);
                        formData.append('file', $('[name=file]').prop('files')[0]);
                        const upload = await JabatanAnggota.Models.upload(formData);

                        await JabatanAnggota.Views.renderTable();
                    }
                    catch(error)  {

                    }
                    finally {
                        $('#modal-jabatan').find('.btn-close').trigger('click')
                        JabatanAnggota.Helpers.resetForm();
                    }
                    
                });

                $(document).on('click', '#table-jabatan .btn-delete', async function(e){
                    e.preventDefault();
                    await JabatanAnggota.Models.delete($(this).data('id'));
                    await JabatanAnggota.Views.renderTable();
                })

                JabatanAnggota.Views.renderTable();
            }
        }
    }

    const KeluargaAnggota = {
        Models: {
            index: async() => {
                return await $.ajax({
                    url: '{{route('keluarga-anggota')}}?anggota_id={{$model->id}}',
                })
            },
            save: async(data) => {
                return await $.ajax({
                    method: 'POST',
                    url: '{{route('keluarga-anggota.save')}}',
                    data: data
                })
            },
            delete: async(id) => {
                return await $.ajax({
                    method: 'POST',
                    url: '{{route('keluarga-anggota.delete')}}',
                    data: {
                        id: id
                    }
                })
            },
            upload: async(data) => {
                return await $.ajax({
                    method: 'POST',
                    url: '{{route('keluarga-anggota.upload')}}',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data
                })
            }
            
        },
        Views: {
            row: (row) =>  {

                let fileBukuNikah = "";

                if(row.file_buku_nikah) {
                    fileBukuNikah = `<div><a href='${UPLOAD_URL  + '/' + row.file_buku_nikah}' target='_blank'>LIHAT</a></div>`
                }

                return `
                <tr>
                    <td>${row.nama}</td>
                    <td>${row.jenis_kelamin}</td>
                    <td>${row.hubungan_keluarga}</td>
                    <td>${row.status}</td>
                    <td>${row.pekerjaan}</td>
                    <td>
                        ${fileBukuNikah}
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-warning btn-edit" onclick="KeluargaAnggota.Helpers.setForm({
                            id: '${row.id}',
                            anggota_id: '${row.anggota_id}',
                            nama: '${row.nama}',
                            jenis_kelamin: '${row.jenis_kelamin}',
                            status: '${row.status}',
                            pekerjaan: '${row.pekerjaan}',
                            tempat_lahir: '${row.tempat_lahir}',
                            tanggal_lahir: '${row.tanggal_lahir}',
                            nik: '${row.nik}',
                            telp: '${row.telp}',
                            alamat: '${row.alamat}',
                            hubungan_keluarga: '${row.hubungan_keluarga}'
                        })">
                            <span class="fas fa-pencil">
                        </a>
                        <a href="javascript:void(0)" data-id="${row.id}" class="btn btn-danger btn-delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                `
            },
            renderTable: async(data) => {
                try {
                    $('#table-keluarga').find('tbody').empty();
                    const response = await KeluargaAnggota.Models.index();
                    console.log('response', response)
                    response.map((row, index) => {
                        console.log('row', row)
                        $('#table-keluarga').find('tbody').append(
                            KeluargaAnggota.Views.row(row)
                        );
                    })
                }
                catch(error) {

                }
                finally {

                }
                
            }
        },
        Helpers: {
            resetForm: () => {
                $('#form-keluarga')[0].reset();
            },
            setForm: (data) =>  {
                const form = $('#form-keluarga')
                for(let d in data) {
                    form.find(`[name=${d}]`).val(data[d])
                }
                $('#modal-keluarga').modal('show');
            },
            init: () => {
                $(document).on('click', '#btn-save_keluarga', async function(e){
                    e.preventDefault();
                    try {
                        const data = $('#form-keluarga').serialize();
                        const response = await KeluargaAnggota.Models.save(data)

                        var formData = new FormData();
                        formData.append('id', response.id);
                        formData.append('file_buku_nikah', $('[name=file_buku_nikah]').prop('files')[0]);
                        const upload = await KeluargaAnggota.Models.upload(formData);

                        await KeluargaAnggota.Views.renderTable();

                    }
                    catch(error)  {

                    }
                    finally {
                        $('#modal-keluarga').find('.btn-close').trigger('click')
                        KeluargaAnggota.Helpers.resetForm();
                    }
                    
                });

                $(document).on('click', '#table-keluarga .btn-delete', async function(e){
                    e.preventDefault();
                    await KeluargaAnggota.Models.delete($(this).data('id'));
                    await KeluargaAnggota.Views.renderTable();
                })

                KeluargaAnggota.Views.renderTable();
            }
        }
    }

    const PendidikanAnggota = {
        Models: {
            index: async() => {
                return await $.ajax({
                    url: '{{route('pendidikan-anggota')}}?anggota_id={{$model->id}}',
                })
            },
            save: async(data) => {
                return await $.ajax({
                    method: 'POST',
                    url: '{{route('pendidikan-anggota.save')}}',
                    data: data
                })
            },
            delete: async(id) => {
                return await $.ajax({
                    method: 'POST',
                    url: '{{route('pendidikan-anggota.delete')}}',
                    data: {
                        id: id
                    }
                })
            },
            upload: async(data) => {
                return await $.ajax({
                    method: 'POST',
                    url: '{{route('pendidikan-anggota.upload')}}',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data
                })
            }
        },
        Views: {
            row: (row) =>  {
                
                let fileIjazah = "";
                let fileTranskripNilai = "";
                let fileAkreditasi = "";

                if(row.file_ijazah) {
                    fileIjazah = `<div><a href='${UPLOAD_URL  + '/' + row.file_ijazah}' target='_blank'>FILE IJAZAH</a></div>`
                }

                if(row.file_transkrip_nilai) {
                    fileTranskripNilai = `<div><a href='${UPLOAD_URL  + '/' + row.file_transkrip_nilai}' target='_blank'>FILE TRANSKRIP NILAI</a></div>`
                }

                if(row.file_akreditasi) {
                    fileAkreditasi = `<div><a href='${UPLOAD_URL  + '/' + row.file_akreditasi}' target='_blank'>FILE AKREDITASI</a></div>`
                }

                return `
                <tr>
                    <td>${row.tingkat}</td>
                    <td>${row.institusi}</td>
                    <td>${row.tanggal_lulus}</td>
                    <td>${row.jurusan}</td>
                    <td>${row.nomor_ijazah}</td>
                    <td>
                        ${fileAkreditasi}
                        ${fileIjazah}
                        ${fileTranskripNilai}
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-warning btn-edit" onclick="PendidikanAnggota.Helpers.setForm({
                            id: '${row.id}',
                            anggota_id: '${row.anggota_id}',
                            tingkat: '${row.tingkat}',
                            institusi: '${row.institusi}',
                            tanggal_mulai_pendidikan: '${row.tanggal_mulai_pendidikan}',
                            tanggal_lulus: '${row.tanggal_lulus}',
                            tampilkan_gelar: '${row.tampilkan_gelar}',
                            jurusan: '${row.jurusan}',
                            nomor_ijazah: '${row.nomor_ijazah}',
                            file_ijazah: '${row.file_ijazah}',
                            transkrip_nilai: '${row.transkrip_nilai}',
                            file_transkrip_nilai: '${row.file_transkrip_nilai}',
                            akreditasi: '${row.akreditasi}',
                            file_akreditasi: '${row.file_akreditasi}',
                        })">
                            <span class="fas fa-pencil">
                        </a>
                        <a href="javascript:void(0)" data-id="${row.id}" class="btn btn-danger btn-delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                `
            },
            renderTable: async(data) => {
                try {
                    $('#table-pendidikan').find('tbody').empty();
                    const response = await PendidikanAnggota.Models.index();
                    console.log('response', response)
                    response.map((row, index) => {
                        console.log('row', row)
                        $('#table-pendidikan').find('tbody').append(
                            PendidikanAnggota.Views.row(row)
                        );
                    })
                }
                catch(error) {

                }
                finally {

                }
                
            }
        },
        Helpers: {
            resetForm: () => {
                $('#form-pendidikan')[0].reset();
            },
            setForm: (data) =>  {
                const form = $('#form-pendidikan')
                for(let d in data) {
                    if(!['file_ijazah', 'file_transkrip_nilai', 'file_akreditasi'].includes(d))
                    {
                        form.find(`[name=${d}]`).val(data[d])
                    }
                    
                }
                $('#modal-pendidikan').modal('show');
            },
            init: () => {
                $(document).on('click', '#btn-save_pendidikan', async function(e){
                    e.preventDefault();
                    try {
                        console.log('test');
                        const data = $('#form-pendidikan').serialize();
                        const response = await PendidikanAnggota.Models.save(data)
                        console.log('response', response.id);

                        var formData = new FormData();
                        formData.append('id', response.id);
                        formData.append('file_ijazah', $('[name=file_ijazah]').prop('files')[0]);
                        formData.append('file_akreditasi', $('[name=file_akreditasi]').prop('files')[0]);
                        formData.append('file_transkrip_nilai', $('[name=file_transkrip_nilai]').prop('files')[0]);

                        const upload = await PendidikanAnggota.Models.upload(formData);

                        await PendidikanAnggota.Views.renderTable();
                    }
                    catch(error)  {

                    }
                    finally {
                        $('#modal-pendidikan').find('.btn-close').trigger('click')
                        PendidikanAnggota.Helpers.resetForm();
                    }
                    
                });

                $(document).on('click', '#table-pendidikan .btn-delete', async function(e){
                    e.preventDefault();
                    await PendidikanAnggota.Models.delete($(this).data('id'));
                    await PendidikanAnggota.Views.renderTable();
                })

                PendidikanAnggota.Views.renderTable();
            }
        }
    }

    JabatanAnggota.Helpers.init();
    KeluargaAnggota.Helpers.init();
    PendidikanAnggota.Helpers.init();
    

</script>

@endsection
