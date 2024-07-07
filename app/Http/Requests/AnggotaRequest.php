<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnggotaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'min:3', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'in:L,P'],
            'alamat' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string', 'min:3', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'no_telp' => ['required', 'string'],
            'foto' => ['nullable', 'image']
        ];
    }
}
