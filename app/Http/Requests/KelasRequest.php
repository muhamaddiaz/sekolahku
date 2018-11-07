<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasRequest extends FormRequest
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
            // Filter setiap request yang masuk untuk menambahkan data kelas
            'tingkat' => 'required|unique:kelas',
            'jurusan' => 'required|unique:kelas',
            'bagian' => 'required|unique:kelas',
            'wali' => 'required'
        ];
    }
}
