@extends('layouts')


@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">{{$singular}}</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">DATA YANG AKAN DI CARI</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row mb-3">
                                <div class="col">
                                    <select name="status" id="" class="form-control form-control-lg">
                                        <option value="">STATUS</option>
                                        <option value="K2" {{request('status') == 'K2' ? 'selected' : ''}}>K2</option>
                                        <option value="NON K2" {{request('status') == 'NON K2' ? 'selected' : ''}}>NON K2</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="jenis_kelamin" id="" class="form-control form-control-lg">
                                        <option value="">JENIS KELAMIN</option>
                                        @foreach(['Pria', 'Wanita'] as $index => $jk)
                                        <option value="{{$jk}}"  {{request('jenis_kelamin') === $jk ? 'selected' : ''}}>{{$jk}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <input name="nama" type="text" class="form-control form-control-lg" placeholder="NAMA" value="{{request('nama')}}">
                                </div>
                                <div class="col">
                                    <input name="no_tenaga" type="text" class="form-control form-control-lg" placeholder="NO TENAGA NON ASN" value="{{request('no_tenaga')}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <input name="jabatan" type="text" class="form-control form-control-lg" placeholder="Jabatan" value="{{request('jabatan')}}">
                                </div>
                                <div class="col">
                                    <select name="satuan_id" id="" class="form-control form-control-lg">
                                        <option value="">PILIH SATUAN</option>
                                        @foreach(\App\Models\SatuanKerja::when(auth()->user()->role_id, function($query, $role_id){
                                            if($role_id == 1) {
                                                return $query->where('id', auth()->user()->satuan_kerja_id);
                                            }
                                        })->orderBy('nama', 'ASC')->get() as $satuan)
                                        <option value="{{$satuan->id}}" {{ $satuan->id == request('satuan_id') ? 'selected' : ''}}>{{$satuan->jenis}} - {{$satuan->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-lg btn-primary d-block w-100">CARI PEGAWAI HARIAN LEPAS</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-4 mb-2 mb-md-0">
                                    {!! \App\Components\Appstack\ButtonAdd::render(route("{$slug}.create")) !!}
                                    {{-- <div class="input-group input-group-search">
                                        <input name="s" type="text" class="form-control" id="datatables-orders-search"
                                            placeholder="Cari..." value="{{request('s')}}"> 
                                        <button class="btn" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" data-lucide="search"
                                                class="lucide lucide-search align-middle">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <path d="m21 21-4.3-4.3"></path>
                                            </svg>
                                        </button>
                                    </div> --}}
                                </div>
                                <div class="col-md-6 col-xl-8">
                                    <div class="text-sm-end">
                                       
                                    </div>
                                </div>
                        </div>
                        </form>
                        
                        
                        @forelse ($koleksi as $row)
                        
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="card shadow-lg">
                                    <div class="card-body d-flex rounded-3">
                                        <div class="col-md-2">
                                            @if($row->foto)
                                            <img src="https://placehold.co/180x240" alt="">
                                            @else 
                                            <img src="https://placehold.co/180x240" alt="" class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="col-md-10 px-3">
                                            <h3>{{$row->nama}}</h3>

                                            <p class="mb-0">TENAGA NON ASN {{$row->status}} / {{ $row->nik }}</p>
                                            <p class="mb-3">PHL {{$row->satuan_kerja->jenis}} {{$row->satuan_kerja->nama ?? '-'}} POLDA SUMUT</p>
                                            <a href="{{route('anggota.edit', $row->id)}}" class="btn btn-lg btn-warning">
                                                <span class="fas fa-pencil me-1"></span> Edit Profile
                                            </a>
                                            <a href="{{route('anggota.show', $row)}}" class="btn btn-lg btn-primary">
                                                <span class="fas fa-eye me-1"></span> Lihat Detail
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Buat data <a href="{{route("{$slug}.create")}}" >disni</a></td>
                            </tr>
                        @endforelse
                        
                        {{$koleksi->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
