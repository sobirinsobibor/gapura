<?php

namespace Modules\PengajuanDana\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAsal extends Model
{
    use HasFactory;

    protected $table = 'judan_bank_asals';

    protected $fillable = [
        'nama_bank',
        'no_rekening',
        'color',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
