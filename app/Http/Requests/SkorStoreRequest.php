<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkorStoreRequest extends FormRequest
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
            'inputs.*.club_id_1' => 'required|different:club_id_2',
            'inputs.*.club_id_2' => 'required|different:club_id_1',
            'inputs.*.score_1' => 'required|numeric|min:0',
            'inputs.*.score_2' => 'required|numeric|min:0',
        ];
    }
    public function messages(): array
    {
    return [
        'inputs.*.club_id_1.required' => 'Club 1 Harus Di Isi',
        'inputs.*.club_id_1.different' => 'Club 1 harus berbeda dengan Club 2',
        'inputs.*.club_id_2.required' => 'Club 2 Harus Di Isi',
        'inputs.*.club_id_2.different' => 'Club 2 harus berbeda dengan Club 1',
        'inputs.*.score_1.required' => 'Skor 1 harus di isi',
        'inputs.*.score_2.required' => 'Skor 2 harus di isi',

    ];
    }

}
