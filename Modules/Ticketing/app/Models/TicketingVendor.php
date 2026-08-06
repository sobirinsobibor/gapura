<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingVendorFactory;

class TicketingVendor extends Model
{
    use HasFactory;
    protected $table = 'ticketing_vendor';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama_vendor',
        'jenis_vendor',
        'is_active',
    ];

    // protected static function newFactory(): TicketingVendorFactory
    // {
    //     // return TicketingVendorFactory::new();
    // }
}
