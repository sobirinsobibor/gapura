<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingTiketKeretaFactory;

class TicketingTiketKereta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'tckt_pemesanan_id',
        'tckt_vendor_id',
        'tckt_kereta_id',
        'tckt_stasiun_berangkat_id',
        'tckt_stasiun_tiba_id',
        'kode_booking_kereta',
        'jadwal_berangkat_kereta',
        'jadwal_tiba_kereta',
        'zona_waktu'
    ];

    public function ticketPemesanan()
    {
        return $this->belongsTo(TicketingPemesanan::class);
    }

    public function ticketingVendor()
    {
        return $this->belongsTo(TicketingVendor::class);
    }

    public function ticketingKereta()
    {
        return $this->belongsTo(TicketingKereta::class);
    }

    public function ticketingBerangkatStasiun()
    {
        return $this->belongsTo(TicketingStasiun::class, 'tckt_stasiun_berangkat_id');
    }

    public function ticketingTibaStasiun()
    {
        return $this->belongsTo(TicketingStasiun::class, 'tckt_stasiun_tiba_id');
    }

    public function ticketingPenumpang()
    {
        return $this->belongsToMany(TicketingPenumpang::class, 'tckt_penumpang_tiket_kereta');
    }
}
