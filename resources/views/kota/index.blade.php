@extends('layouts')


@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">{{$singular}}</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-4 mb-2 mb-md-0">
                                    <div class="input-group input-group-search">
                                        <input name="s" type="text" class="form-control" id="datatables-orders-search"
                                            placeholder="Search orders…">
                                        <button class="btn" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" data-lucide="search"
                                                class="lucide lucide-search align-middle">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <path d="m21 21-4.3-4.3"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-8">
                                    <div class="text-sm-end">
                                    
                                        {!! \App\Components\Appstack\ButtonAdd::render(route("{$slug}.create")) !!}
                                    </div>
                                </div>
                        </div>
                        </form>
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Provinsi</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($koleksi as $row)
                                    <tr>
                                        <td>
                                            <div>{{ $row->provinsi->nama ?? '-' }}</div>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route( "{$slug}.edit", $row->id) }}">Edit</a> 
                                                <span class="mx-2">|</span>
                                                <form action="{{ route( "{$slug}.destroy", $row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn p-0">
                                                        <span class="text-danger">Hapus</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>{{$row->nama}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">Buat data <a href="{{route("{$slug}.create")}}" >disni</a></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$koleksi->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
