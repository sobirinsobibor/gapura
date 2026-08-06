<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingPenumpangFactory;

class TicketingPenumpang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama_penumpang',
        'jenis_kelamin'
    ];

    public function ticketingUnitKerja()
    {
        return $this->belongsTo(TicketingUnitKerja::class);
    }

    public function ticketingTiketPesawat()
    {
        return $this->belongsToMany(TicketingTiketPesawat::class, 'ticketing_penumpang_tiket_pesawat');
    }

    public function ticketingTiketKereta()
    {
        return $this->belongsToMany(TicketingTiketKereta::class, 'ticketing_penumpang_tiket_kereta');
    }

    public function ticketingKamarHotel()
    {
        return $this->belongsToMany(TicketingKamarHotel::class, 'ticketing_kamar_hotel_penumpang');
    }

    public function ticketingPembayaranPenumpang()
    {
        return $this->hasMany(TicketingPembayaranPenumpang::class);
    }
}
