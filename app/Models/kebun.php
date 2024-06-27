<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebun extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kecamatan',
        'nama',
        'informasi_tambahan',
        'tanggal',
        'lokasi_gps',
        'gambar',
        'jenis_kebun',
        'status',
        'user_id',
        'warna_zone'
    ];  

    public function foreign_kecamatan()
    {
        // data model mitraa dimiliki oleh model user melalui fk 'id_mitra' belongsTo
        return $this->belongsTo(kecamatan::class, 'id_kecamatan');
    }   

    public function foreign_jeniskebun()
    {
        // data model mitraa dimiliki oleh model user melalui fk 'id_mitra' belongsTo
        return $this->belongsTo(jenis_kebun::class, 'jenis_kebun');
    }   
    public function foreign_user()
    {
        // data model mitraa dimiliki oleh model user melalui fk 'id_mitra' belongsTo
        return $this->belongsTo(user::class, 'user_id');
    }

        /**
     * Scope a query to only include kebun associated with admin user.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdminKebun($query)
    {
        $user = auth()->user();
        if ($user->isAdmin()) {
            return $query;
        } else {
            return $query->where('user_id', $user->id);
        }
    }  
         
}

