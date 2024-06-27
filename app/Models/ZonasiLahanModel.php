<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZonasiLahanModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $timestamp = true;
    protected $table = "table_zonasi";
    protected $fillable = [
        'id','id_kecamatan','id_kebun','zone_collections'
    ];
}
