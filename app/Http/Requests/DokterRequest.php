<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DokterRequest extends FormRequest
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
            'nama_dokter' => 'required|string',
            'spesialis' => 'required|string',
            'telephone' => 'required|string',
            'alamat' => 'required|string',
            'waktu_mulai_praktik' => 'required',
            'waktu_selesai_praktik' => 'required',
            'is_active' => 'required|boolean',
        ];
    }
}
