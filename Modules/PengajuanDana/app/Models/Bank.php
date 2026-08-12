<?php

namespace Modules\PengajuanDana\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table = 'judan_banks';

    protected $fillable = [
        'kode_bank',
        'nama_bank',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
