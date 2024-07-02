@extends('layouts')


@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Dashboard</h1>

        <div class="row">

            <div class="col-md-4">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Pencarian Personel</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <select name="status" id="" class="form-control mb-3">
                                <option value="">SEMUA</option>
                                <option value="K2">K2</option>
                                <option value="NON K2">NON K2</option>
                            </select>

                            <select name="jenis_kelamin" id="" class="form-control mb-3">
                                <option value="">JENIS KELAMIN</option>
                                <option value="0">PRIA</option>
                                <option value="1">WANITA</option>
                            </select>

                            <div class="row mb-3">
                                <div class="col">
                                    <input name="nama" type="text" class="form-control" placeholder="NAMA">
                                </div>
                                <div class="col">
                                    <input name="no_tenaga" type="text" class="form-control" placeholder="NO TENAGA NON ASN">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <input name="jabatan" type="text" class="form-control" placeholder="Jabatan">
                                </div>
                                <div class="col">
                                    <select name="status" id="" class="form-control">
                                        <option value="">SATKER/SATWIL</option>
                                        @foreach(\App\Models\SatuanKerja::orderBy('nama', 'ASC')->get() as $satuan)
                                        <option value="{{$satuan->id}}">{{$satuan->jenis}} - {{$satuan->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-primary d-block w-100">CARI</button>

                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">
                            Statistik Tenaga Non ASN
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="mb-0">TOTAL PERSONEL TENAGA NON ASN</p>
                                <h3>{{ number_format($total_personel) }}</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p class="mb-0">TENAGA NON ASN K2</p>
                                <h3>{{ number_format($total_k2_pria + $total_k2_wanita) }}</h3>
                            </div>

                            <div class="col-md-4">
                                <p class="mb-0">TENAGA NON ASN K2 PRIA</p>
                                <h3>{{ number_format($total_k2_pria) }}</h3>
                            </div>


                            <div class="col-md-4">
                                <p class="mb-0">TENAGA NON ASN NON K2 PRIA</p>
                                <h3>{{ number_format($total_non_k2_pria) }}</h3>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <p class="mb-0">TENAGA NON ASN NON K2</p>
                                <h3>{{ number_format($total_non_k2_wanita + $total_k2_wanita) }}</h3>
                            </div>

                            <div class="col-md-4">
                                <p class="mb-0">TENAGA NON ASN K2 WANITA</p>
                                <h3>{{ number_format($total_k2_wanita) }}</h3>
                            </div>


                            <div class="col-md-4">
                                <p class="mb-0">TENAGA NON ASN NON K2 WANITA</p>
                                <h3>{{ number_format($total_non_k2_wanita) }}</h3>
                            </div>

                        </div>

                    </div>
                </div>


            </div>


            


            


            

        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Statistik Tenaga K2</h3>
                    </div>
                    <div class="card-body">
                        <div id="canvas-statistik-non-k2"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Statistik Tenaga Non K2</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div id="canvas-statistik-k2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">
                            Statstik Tenagan Non ASN
                        </h3>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card flex-fill mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">TENAGA NON ASN K2</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat stat-sm">
                                    <i data-lucide="user"></i>
                                </div>
                            </div>
                        </div>
                        <span class="h1 d-inline-block mt-1 mb-3">{{$total_k2}}</span>
                    </div>
                </div>

                <div class="card flex-fill mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">TENAGA NON ASN NON K2</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat stat-sm">
                                    <i data-lucide="user"></i>
                                </div>
                            </div>
                        </div>
                        <span class="h1 d-inline-block mt-1 mb-3">{{$total_non_k2}}</span>
                    </div>
                </div>

                <div class="card flex-fill mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">TOTAL</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat stat-sm">
                                    <i data-lucide="user"></i>
                                </div>
                            </div>
                        </div>
                        <span class="h1 d-inline-block mt-1 mb-3">{{$total_non_k2 + $total_k2}}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/css/jsvectormap.min.css" />
<style>
    #map { 
        height: 180px; 
    }
</style>
@endsection

@section('footer')
    <script src="{{ url('assets/js/apex.min.js') }}"></script>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        var options = {
            dataLabels: {
                enabled: false
            },
            chart: {
                type: 'donut'
            },
            series: [{{$total_k2_pria}}, {{$total_k2_wanita}}],
            labels: ['PRIA', 'WANITA', ]
        }

        var chart = new ApexCharts(document.querySelector("#canvas-statistik-non-k2"), options);

        chart.render();


        var options = {
            dataLabels: {
                enabled: false
            },
            chart: {
                type: 'donut'
            },
            series: [{{(int)$total_non_k2_pria}}, {{$total_non_k2_wanita}}],
            labels: ['PRIA', 'WANITA', ]
        }

        var chart = new ApexCharts(document.querySelector("#canvas-statistik-k2"), options);

        chart.render();

        var map = L.map('map').setView([2.115355, 99.545097], 1);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 5,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        })
        .addTo(map);
    </script>
@endsection
