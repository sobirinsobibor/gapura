<?php

namespace Modules\PengajuanDana\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    use HasFactory;

    protected $table = 'judan_needs';

    protected $fillable = [
        'kode_kebutuhan',
        'nama_kebutuhan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
