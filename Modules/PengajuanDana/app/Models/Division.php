<?php

namespace Modules\PengajuanDana\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = 'judan_divisions';

    protected $fillable = [
        'kode_divisi',
        'nama_divisi',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
