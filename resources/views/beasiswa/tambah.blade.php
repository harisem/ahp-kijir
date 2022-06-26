@extends('templates.master')

@section('title')
Tambah Pengajuan Bantuan Beasiswa
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Pengajuan Bantuan Beasiswa</h1>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <form action="{{ route('beasiswa.pengajuan') }}" method="POST" class="col-12" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Data Karyawan
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="nip" class="col-sm-5 col-form-label">NIP</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" value="{{ $user->nip }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="namaKaryawan" class="col-sm-5 col-form-label">Nama Karyawan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="namaKaryawan" id="namaKaryawan" placeholder="Nama Karyawan" value="{{ $user->profiles->name }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="masaKerja" class="col-sm-5 col-form-label">Masa Kerja</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="masaKerja" id="masaKerja" placeholder="Masa Kerja" value="{{ $currentYear - date('Y', strtotime($user->profiles->mulai_kerja)) }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="gajiPokok" class="col-sm-5 col-form-label">Gaji Pokok</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="gajiPokok" id="gajiPokok" placeholder="Gaji Pokok" value="{{ $user->profiles->gaji_pokok }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jumlahTanggungan" class="col-sm-5 col-form-label">Jumlah Tanggungan</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="jumlahTanggungan" id="jumlahTanggungan" placeholder="Jumlah Tanggungan" value="{{ count($user->profiles->tanggungans) }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="suratPermohonanBeasiswa" class="col-sm-5 col-form-label">Surat Permohonan Beasiswa</label>
                            <div class="col-sm-7">
                                <input class="form-control @error('suratPermohonanBeasiswa') is-invalid @enderror" type="file" name="suratPermohonanBeasiswa" id="suratPermohonanBeasiswa">
                                @error('suratPermohonanBeasiswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Data Anak
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="namaAnak" class="col-sm-5 col-form-label">Nama Anak</label>
                            <div class="col-sm-7">
                                {{-- <input type="text" name="namaAnak" id="namaAnak" class="form-control" placeholder="Nama Anak"> --}}
                                <select name="namaAnak" id="namaAnak" class="custom-select @error('namaAnak') is-invalid @enderror" aria-label="Default select example">
                                    <option value="" selected disabled>Silahkan pilih anak...</option>
                                    @foreach ($user->profiles->tanggungans as $item)
                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('namaAnak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenjangPendidikan" class="col-sm-5 col-form-label">Jenjang Pendidikan</label>
                            <div class="col-sm-7">
                                <select name="jenjangPendidikan" id="jenjangPendidikan" class="custom-select @error('namaAnak') is-invalid @enderror" aria-label="Default select example">
                                    <option value="" selected disabled>Pilih jenjang pendidikan...</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D3/D4">D3/D4</option>
                                    <option value="S1">S1</option>
                                </select>
                                @error('jenjangPendidikan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="institusiPendidikan" class="col-sm-5 col-form-label">Institusi Pendidikan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('institusiPendidikan') is-invalid @enderror" name="institusiPendidikan" id="institusiPendidikan" placeholder="Institusi Pendidikan">
                                @error('institusiPendidikan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nilai" class="col-sm-5 col-form-label">Nilai</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('nilai') is-invalid @enderror" name="nilai" id="nilai" placeholder="Nilai">
                                @error('nilai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="legalisirIjazah" class="col-sm-5 col-form-label">Legalisir Ijazah</label>
                            <div class="col-sm-7">
                                <input class="form-control @error('legalisirIjazah') is-invalid @enderror" type="file" name="legalisirIjazah" id="legalisirIjazah">
                                @error('legalisirIjazah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="suratKeteranganPendidikan" class="col-sm-5 col-form-label">Surat Keterangan Pendidikan</label>
                            <div class="col-sm-7">
                                <input class="form-control @error('suratKeteranganPendidikan') is-invalid @enderror" type="file" name="suratKeteranganPendidikan" id="suratKeteranganPendidikan">
                                @error('suratKeteranganPendidikan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection