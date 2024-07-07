<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
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
            'kode' => ['required', 'string', 'min:3', 'max:255'],
            'isbn' => ['required', 'string', 'min:3', 'max:255'],
            'nama_buku' => ['required', 'string', 'min:3', 'max:255'],
            'pengarang' => ['required', 'string', 'min:3', 'max:255'],
            'penerbit' => ['required', 'string', 'min:3', 'max:255'],
            'tahun_terbit' => ['required', 'date_format:Y'],
            'deskripsi' => ['required', 'string', 'min:3', 'max:255'],
            'status' => ['required', 'string', 'in:ada,tidak_ada'],
        ];
    }
}
