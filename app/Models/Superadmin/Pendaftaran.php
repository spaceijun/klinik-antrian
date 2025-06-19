<?php

namespace App\Models\Superadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pendaftaran
 *
 * @property $id
 * @property $pasien_id
 * @property $dokter_id
 * @property $tgl_pendaftaran
 * @property $queue_number
 * @property $queue_position
 * @property $status
 * @property $keluhan_utama
 * @property $catatan
 * @property $registered_at
 * @property $called_at
 * @property $started_at
 * @property $completed_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Dokter $dokter
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pendaftaran extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['pasien_id', 'dokter_id', 'tgl_pendaftaran', 'queue_number', 'queue_position', 'status', 'keluhan_utama', 'catatan', 'registered_at', 'called_at', 'started_at', 'completed_at'];


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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rekamMedise()
    {
        return $this->hasOne(\App\Models\Superadmin\RekamMedise::class, 'pendaftaran_id', 'id');
    }
}
