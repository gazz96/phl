@extends('layouts')


@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Dashboard</h1>

        <div class="row">
            <div class="col-12 col-sm-6 col-xxl-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h3 class="mb-2">{{ number_format(\App\Models\Anggota::count()) }}</h3>
                                <p class="mb-2">Total Personel</p>
                            </div>
                            <div class="d-inline-block ms-3">
                                <div class="stat">
                                    <i data-lucide="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xxl-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h3 class="mb-2">{{ number_format(\App\Models\Anggota::count()) }}</h3>
                                <p class="mb-2">Total Personel K2</p>
                            </div>
                            <div class="d-inline-block ms-3">
                                <div class="stat">
                                    <i data-lucide="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xxl-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h3 class="mb-2">{{ number_format(\App\Models\Anggota::count()) }}</h3>
                                <p class="mb-2">Total Personel Non K2</p>
                            </div>
                            <div class="d-inline-block ms-3">
                                <div class="stat">
                                    <i data-lucide="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h3 class="mb-2">{{ number_format(\App\Models\Anggota::count()) }}</h3>
                                <p class="mb-2">Total Personel K2 Pria</p>
                            </div>
                            <div class="d-inline-block ms-3">
                                <div class="stat">
                                    <i data-lucide="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h3 class="mb-2">{{ number_format(\App\Models\Anggota::count()) }}</h3>
                                <p class="mb-2">Total Personel K2 Wanita</p>
                            </div>
                            <div class="d-inline-block ms-3">
                                <div class="stat">
                                    <i data-lucide="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h3 class="mb-2">{{ number_format(\App\Models\Anggota::count()) }}</h3>
                                <p class="mb-2">Total Personel Non K2 Pria</p>
                            </div>
                            <div class="d-inline-block ms-3">
                                <div class="stat">
                                    <i data-lucide="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h3 class="mb-2">{{ number_format(\App\Models\Anggota::count()) }}</h3>
                                <p class="mb-2">Total Personel Non K2 Wanita</p>
                            </div>
                            <div class="d-inline-block ms-3">
                                <div class="stat">
                                    <i data-lucide="user"></i>
                                </div>
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
                        <div id="canvas-statistik-k2"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
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
        </div>

    </div>
@endsection

@section('footer')
    <script src="{{ url('assets/js/apex.min.js') }}"></script>
    <script>
        var options = {
            dataLabels: {
                enabled: false
            },
            chart: {
                type: 'donut'
            },
            series: [44, 55],
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
            series: [44, 55],
            labels: ['PRIA', 'WANITA', ]
        }

        var chart = new ApexCharts(document.querySelector("#canvas-statistik-k2"), options);

        chart.render();
    </script>
@endsection
