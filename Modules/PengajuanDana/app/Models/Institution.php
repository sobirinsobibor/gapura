<?php

namespace Modules\PengajuanDana\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $table = 'judan_institutions';

    protected $fillable = [
        'kode_institusi',
        'nama_institusi',
        'slug',
        'kontak',
        'email',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
