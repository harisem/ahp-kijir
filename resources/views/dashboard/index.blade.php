@extends('templates.master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Dashboard Pengajuan Beasiswa</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" class="col-md-3 mb-3">
                <div class="row">
                    <label for="" class="col-sm-3 col-form-label text-dark">Tahun</label>
                    <div class="col-sm-5">
                        <select class="custom-select" aria-label="Default select example">
                            <option value="2022" selected>2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-xl-4 col-md-12 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Jumlah Pengajuan Masuk
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-inbox fa-2x text-gray-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Jumlah Pengajuan Selesai
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check-double fa-2x text-gray-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Pengajuan Diterima
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-gray-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header text-center">
                            <h6 class="m-0 font-weight-bold text-primary">Penerima Beasiswa Berdasarkan Masa Kerja</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="masaKerjaPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header text-center">
                            <h6 class="m-0 font-weight-bold text-primary">Penerima Beasiswa Berdasarkan Gaji Pokok</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="gajiPokokPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header text-center">
                            <h6 class="m-0 font-weight-bold text-primary">Penerima Beasiswa Berdasarkan Tanggungan</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="tanggunganPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header text-center">
                            <h6 class="m-0 font-weight-bold text-primary">Penerima Beasiswa Berdasarkan Pendidikan</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="pendidikanPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header text-center">
                            <h6 class="m-0 font-weight-bold text-primary">Penerima Beasiswa Berdasarkan Nilai</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="nilaiPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<!-- Page level plugins -->
<script src="{{ asset('sb-admin-2/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
{{-- <script src="{{ asset('sb-admin-2/js/demo/chart-area-demo.js') }}"></script> --}}
<script src="{{ asset('sb-admin-2/js/demo/chart-pie-demo.js') }}"></script>
@endpush