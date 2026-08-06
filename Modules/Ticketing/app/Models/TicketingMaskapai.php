<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingMaskapaiFactory;

class TicketingMaskapai extends Model
{
    use HasFactory;
    protected $table = 'ticketing_maskapai';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama_maskapai',
        'kode_maskapai',
        'is_active',
    ];

    // protected static function newFactory(): TicketingMaskapaiFactory
    // {
    //     // return TicketingMaskapaiFactory::new();
    // }
}
