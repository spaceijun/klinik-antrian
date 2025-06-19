<?php

namespace App\Models\Superadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dokter
 *
 * @property $id
 * @property $nama_dokter
 * @property $spesialis
 * @property $telephone
 * @property $alamat
 * @property $waktu_mulai_praktik
 * @property $waktu_selesai_praktik
 * @property $is_active
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dokter extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nama_dokter', 'spesialis', 'telephone', 'alamat', 'waktu_mulai_praktik', 'waktu_selesai_praktik', 'is_active'];


}
