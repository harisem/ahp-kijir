<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
            'judul' => 'required|max:50',
            'deskripsi' => 'required',
            'file_lampiran' => 'required|mimes:pdf',
            'gambar_header' => 'required|mimes:jpg,png,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul tidak boleh kosong',
            'judul.max' => 'Judul maximal 50 karakter',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'file_lampiran.required' => 'File lampiran tidak boleh kosong',
            'file_lampiran.mimes' => 'File lampiran hanya bisa berbentuk pdf',
            'gambar_header.required' => 'Gambar tidak boleh kosong',
            'gambar_header.mimes' => 'Gambar hanya bisa berbentuk jpg,png,jpeg'
        ];
    }
}
