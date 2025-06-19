<?php

namespace App\Models\Superadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RekamMedise
 *
 * @property $id
 * @property $pendaftaran_id
 * @property $pasien_id
 * @property $dokter_id
 * @property $berat_badan
 * @property $tinggi_badan
 * @property $tekanan_darah
 * @property $tempratur
 * @property $denyut_nadi
 * @property $keluhan_utama
 * @property $riwayat_penyakit
 * @property $diagnosis
 * @property $rencana_pengobatan
 * @property $resep_obat
 * @property $notes
 * @property $kunjungan_berikutnya
 * @property $catatan_berikutnya
 * @property $created_at
 * @property $updated_at
 *
 * @property Dokter $dokter
 * @property User $user
 * @property Pendaftaran $pendaftaran
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RekamMedise extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['pendaftaran_id', 'pasien_id', 'dokter_id', 'berat_badan', 'tinggi_badan', 'tekanan_darah', 'tempratur', 'denyut_nadi', 'keluhan_utama', 'riwayat_penyakit', 'diagnosis', 'rencana_pengobatan', 'resep_obat', 'notes', 'kunjungan_berikutnya', 'catatan_berikutnya'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dokter()
    {
        return $this->belongsTo(\App\Models\Superadmin\Dokter::class, 'dokter_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'pasien_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pendaftaran()
    {
        return $this->belongsTo(\App\Models\Superadmin\Pendaftaran::class, 'pendaftaran_id', 'id');
    }
}
