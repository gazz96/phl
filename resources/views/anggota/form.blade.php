@extends('layouts')


@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Form {{ $singular }}</h1>
        @php
            $url = $model->id ? route("{$slug}.update", $model->id) : route("{$slug}.store");
        @endphp
        <form action="{{ $url }}" method="POST">
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

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="colored-vertical-icon-tab-1" role="tabpanel">
                                <div class="">

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
                                                    <option value="{{ $index }}"
                                                        {{ $index === $model->jenis_rambut ? 'selected' : '' }}>{{ $jenis_rambut }}
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
                                                    <option value="{{ $index }}"
                                                        {{ $index === $model->status_pernikahan ? 'selected' : '' }}>
                                                        {{ $status_pernikahan }}</option>
                                                @endforeach
                                            </select>
                                            @error('status_pernikahan')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-warna_mata">Warna Mata</label>
                                            <select name="warna_mata" type="date" class="form-control form-control-lg"
                                                id="i-warna_mata">
                                                @foreach (['Hitam', 'Cokelat', 'Biru', 'Hijau', 'Merah Mudah'] as $index => $warna_mata)
                                                    <option value="{{ $warna_mata }}"
                                                        {{ $index === $model->wana_mata ? 'selected' : '' }}>{{ $warna_mata }}
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
                                                        {{ $index === $model->warna_kulit ? 'selected' : '' }}>{{ $warna_kulit }}
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
                                                <option value="{{ $warna_kulit }}"
                                                    {{ $index === $model->warna_rambut ? 'selected' : '' }}>{{ $warna_rambut }}
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
                                            <label for="i-suku">Tinggi</label>
                                            <input name="suku" type="text" class="form-control form-control-lg" id="i-suku"
                                                value="{{ old('suku', $model->suku) }}">
                                            @error('suku')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-suku">Berat</label>
                                            <input name="suku" type="text" class="form-control form-control-lg" id="i-suku"
                                                value="{{ old('suku', $model->suku) }}">
                                            @error('suku')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="i-suku">Ukuran Sepatu</label>
                                            <input name="suku" type="text" class="form-control form-control-lg" id="i-suku"
                                                value="{{ old('suku', $model->suku) }}">
                                            @error('suku')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-suku">Ukuran Topi</label>
                                            <input name="suku" type="text" class="form-control form-control-lg" id="i-suku"
                                                value="{{ old('suku', $model->suku) }}">
                                            @error('suku')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="i-suku">Ukuran Celana</label>
                                            <input name="suku" type="text" class="form-control form-control-lg" id="i-suku"
                                                value="{{ old('suku', $model->suku) }}">
                                            @error('suku')
                                                <span class="d-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-3 col">
                                            <label for="i-suku">Ukuran Baju</label>
                                            <input name="suku" type="text" class="form-control form-control-lg" id="i-suku"
                                                value="{{ old('suku', $model->suku) }}">
                                            @error('suku')
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
        
        
        
        
                                    <div class="d-flex align-items-center justify-content-end">
                                        <a href="{{ route("{$slug}.index") }}"
                                            class="btn btn-lg btn-outline-secondary me-2">Kembali</a>
                                        <button class="btn btn-primary btn-lg">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="colored-vertical-icon-tab-2" role="tabpanel">
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
                                <table class="table table-bordered" id="table-keluarga">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Hubungan Keluarga</th>
                                            <th>Status</th>
                                            <th>Pekerjaan</th>
                                            <th>File Buku Nikah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center">Data tidak ada</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="colored-vertical-icon-tab-4">
                                <table class="table table-bordered" id="table-pendidikan">
                                    <thead>
                                        <tr>
                                            <th>Tingkat</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lulus</th>
                                            <th>Jurusan</th>
                                            <th>Nomor Ijazah</th>
                                            <th>File Ijazah</th>
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
@endsection
