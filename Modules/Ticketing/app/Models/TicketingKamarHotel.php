<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingKamarHotelFactory;

class TicketingKamarHotel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'tckt_hotel_id',
        'tckt_vendor_id',
        'tckt_pemesanan_id',
        'jumlah_kamar',
        'lama_menginap',
        'tipe_kamar',
        'jadwal_checkin',
        'jadwal_checkout',
        'include_breakfast',
        'zona_waktu'
    ];

    public function ticketingVendor()
    {
        return $this->belongsTo(TicketingVendor::class);
    }

    public function ticketingHotel()
    {
        return $this->belongsTo(TicketingHotel::class);
    }

    public function ticketingPemesanan()
    {
        return $this->belongsTo(TicketingPemesanan::class);
    }

    public function ticketingPenumpang()
    {
        return $this->belongsToMany(TicketingPenumpang::class, 'ticketing_kamar_hotel_penumpang');
    }


}
