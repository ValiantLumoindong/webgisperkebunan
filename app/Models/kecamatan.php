<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kecamatan',
        'informasi_tambahan',
    ];  

    // Relasi dengan model Kebun
    public function kebun()
    {
        return $this->hasMany(Kebun::class, 'id_kecamatan');
    }
}
