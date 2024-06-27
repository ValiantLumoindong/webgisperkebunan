<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kecamatan',
        'nama_produksi',
        'luas_tanam',
        'luas_panen',
        'produksi',
        'tanggal',
        'lokasi_gps',
        'gambar',
        'informasi_tambahan',
    ];		
	
    public function foreign_kecamatan()
    {
        // data model mitraa dimiliki oleh model user melalui fk 'id_mitra' belongsTo
        return $this->belongsTo(kecamatan::class, 'id_kecamatan');
    }   
    
}
