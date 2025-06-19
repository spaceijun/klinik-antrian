<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
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
			'pasien_id' => 'required',
			'dokter_id' => 'required',
			'tgl_pendaftaran' => 'required',
			'queue_number' => 'required|string',
			'queue_position' => 'required',
			'status' => 'required',
			'keluhan_utama' => 'required|string',
			'catatan' => 'string',
			'registered_at' => 'required',
        ];
    }
}
