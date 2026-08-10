<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketingPelanggan extends Model
{
    use HasFactory;
    protected $table = 'ticketing_pelanggan';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama_pelanggan',
    ];
}
