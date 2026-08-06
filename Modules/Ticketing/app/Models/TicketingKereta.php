<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingKeretaFactory;

class TicketingKereta extends Model
{
    use HasFactory;

    protected $table = 'ticketing_kereta';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama_kereta',
        'is_active',
    ];

    // protected static function newFactory(): TicketingKeretaFactory
    // {
    //     // return TicketingKeretaFactory::new();
    // }
}
