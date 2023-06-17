<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftarans extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
        'semester',
        'ipk',
        'beasiswa',
        'berkas',
    ];
}
