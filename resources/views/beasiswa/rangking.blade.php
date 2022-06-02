@extends('templates.master')

@section('title')
    Perangkingan Beasiswa
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Perangkingan Beasiswa</h1>
        
        <div class="card shadow mb-4 mt-4">
            <div class="card-header">
                <h1 class="h5 text-center my-auto">
                    Silahkan isi nilai bobot kriteria
                </h1>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md">
                            <div class="mr-2 row">
                                <label for="masaKerja" class="col-sm-7 my-auto text-right">Masa Kerja</label>
                                <div class="col-sm-5">
                                    <input type="text" name="masaKerja" id="masaKerja" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mr-2 row">
                                <label for="gajiPokok" class="col-sm-7 my-auto text-right">Gaji Pokok</label>
                                <div class="col-sm-5">
                                    <input type="text" name="gajiPokok" id="gajiPokok" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mr-2 row">
                                <label for="tanggungan" class="col-sm-7 my-auto text-right">Tanggungan</label>
                                <div class="col-sm-5">
                                    <input type="text" name="tanggungan" id="tanggungan" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mr-2 row">
                                <label for="pendidikan" class="col-sm-7 my-auto text-right">Pendidikan</label>
                                <div class="col-sm-5">
                                    <input type="text" name="pendidikan" id="pendidikan" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mr-2 row">
                                <label for="nilai" class="col-sm-7 my-auto text-right">Nilai</label>
                                <div class="col-sm-5">
                                    <input type="text" name="nilai" id="nilai" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center mb-4">
            <button type="button" class="btn btn-primary">Lakukan Perangkingan</button>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Perangkingan</th>
                                <th>Nama Karyawan</th>
                                <th>Nama Penerima Beasiswa</th>
                                <th>Masa Kerja</th>
                                <th>Gaji Pokok</th>
                                <th>Tanggungan</th>
                                <th>Pendidikan</th>
                                <th>Nilai</th>
                                <th>Nilai Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mulyanto</td>
                                <td>Kurnianto</td>
                                <td>8 Tahun</td>
                                <td>Rp. 4.000.000</td>
                                <td>4</td>
                                <td>S1</td>
                                <td>3.62</td>
                                <td>0.419</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Bumi Ardi</td>
                                <td>Bima Satria</td>
                                <td>4 Tahun</td>
                                <td>Rp. 5.000.000</td>
                                <td>2</td>
                                <td>SD</td>
                                <td>85.50</td>
                                <td>0.241</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Syahrul</td>
                                <td>Adrianto</td>
                                <td>2 Tahun</td>
                                <td>Rp. 6.000.000</td>
                                <td>3</td>
                                <td>SD</td>
                                <td>83.50</td>
                                <td>0.192</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Reza</td>
                                <td>Anisa</td>
                                <td>2 Tahun</td>
                                <td>Rp. 8.000.000</td>
                                <td>2</td>
                                <td>SMP</td>
                                <td>88.00</td>
                                <td>0.148</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection