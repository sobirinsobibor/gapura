<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingBandaraFactory;

class TicketingBandara extends Model
{
    use HasFactory;

    protected $table = 'ticketing_bandara';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama_bandara',
        'kode_bandara',
        'is_active',
    ];

    // protected static function newFactory(): TicketingBandaraFactory
    // {
    //     // return TicketingBandaraFactory::new();
    // }
}
