<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_kebun extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kebun',
    ];  

    // Relasi dengan model Kebun
    public function kebun()
    {
        return $this->hasMany(kebun::class, 'jenis_kebun');
    }
}
