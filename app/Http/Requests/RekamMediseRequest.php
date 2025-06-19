<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RekamMediseRequest extends FormRequest
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
            'pendaftaran_id' => 'required',
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'berat_badan' => 'required|string',
            'tinggi_badan' => 'required|string',
            'tekanan_darah' => 'required|string',
            'tempratur' => 'required|string',
            'denyut_nadi' => 'required|string',
            'keluhan_utama' => 'required|string',
            'riwayat_penyakit' => 'nullable|string',
            'diagnosis' => 'required|string',
            'rencana_pengobatan' => 'required|string',
            'resep_obat' => 'required|string',
            'notes' => 'required|string',
            'kunjungan_berikutnya' => 'nullable|date',
            'catatan_berikutnya' => 'nullable|string',
        ];
    }
}
