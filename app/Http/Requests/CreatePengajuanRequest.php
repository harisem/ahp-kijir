<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePengajuanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nip' => 'required',
            'namaKaryawan' => 'required',
            'masaKerja' => 'required',
            'gajiPokok' => 'required',
            'jumlahTanggungan' => 'required',
            'suratPermohonanBeasiswa' => 'required|mimes:pdf',
            'namaAnak' => 'required',
            'jenjangPendidikan' => 'required',
            'institusiPendidikan' => 'required',
            'nilai' => 'required',
            'legalisirIjazah' => 'required|mimes:pdf',
            'suratKeteranganPendidikan' => 'required|mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'nip.required' => 'NIP tidak boleh kosong.',
            'namaKaryawan.required' => 'Nama karyawan tidak boleh kosong.',
            'masaKerja.required' => 'Masa kerja tidak boleh kosong.',
            'gajiPokok.required' => 'Gaji pokok tidak boleh kosong.',
            'jumlahTanggungan.required' => 'Jumlah tanggungan tidak boleh kosong.',
            'suratPermohonanBeasiswa.required' => 'Surat permohonan beasiswa tidak boleh kosong.',
            'suratPermohonanBeasiswa.mimes' => 'File surat permohonan beasiswa hanya dalam bentuk pdf.',
            'namaAnak.required' => 'Nama anak tidak boleh kosong',
            'jenjangPendidikan.required' => 'Jenjang pendidikan tidak boleh kosong',
            'institusiPendidikan.required' => 'Institusi pendidikan tidak boleh kosong',
            'nilai.required' => 'Nilai tidak boleh kosong',
            'legalisirIjazah.required' => 'Legalisir ijazah tidak boleh kosong.',
            'legalisirIjazah.mimes' => 'File legalisir ijazah hanya dalam bentuk pdf.',
            'suratKeteranganPendidikan.required' => 'Surat keterangan pendidikan tidak boleh kosong.',
            'suratKeteranganPendidikan.mimes' => 'File surat keterangan pendidikan hanya dalam bentuk pdf.',
        ];
    }
}
