<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingStasiunFactory;

class TicketingStasiun extends Model
{
    use HasFactory;
    protected $table = 'ticketing_stasiun';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama_stasiun',
        'kode_stasiun',
        'is_active',
    ];

    // protected static function newFactory(): TicketingStasiunFactory
    // {
    //     // return TicketingStasiunFactory::new();
    // }
}
