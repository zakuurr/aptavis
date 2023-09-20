<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_club' => 'unique:clubs,nama_club|required',
            'kota_club' => 'required'
        ];
    }

    public function messages(): array
    {
    return [
        'nama_club.unique' => 'Nama klub sudah ada.',
        'nama_club.required' => 'Nama klub harus diisi.',
        'kota_club.required' => 'Kota klub harus diisi.',
    ];
    }
}
