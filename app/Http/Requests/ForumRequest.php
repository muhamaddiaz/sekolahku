<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForumRequest extends FormRequest
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
            // Validasi data dari request yang dikirim oleh user kepada controller

            'title' => 'required|min:5|max:30',
            'description' => 'required|min:10|max:255'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Kolom title tidak boleh kosong',
            'title.min' => 'Kolom title minimal 5 karakter',
            'title.max' => 'Kolom title maksimal 255 karakter',
            'description.required' => 'Kolom description tidak boleh kosong',
            'description.min' => 'Kolom description minimal 5 karakter',
            'description.max' => 'Kolom description maksimal 255 karakter',
        ];
    }
}
