<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingTiketPesawatFactory;

class TicketingTiketPesawat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'tckt_maskapai_id',
        'tckt_vendor_id',
        'tckt_pemesanan_id',
        'tckt_bandara_berangkat_id',
        'tckt_bandara_tiba_id',
        'nomor_ticket',
        'nomor_penerbangan',
        'kode_booking_pesawat',
        'kelas',
        'jadwal_berangkat_pesawat',
        'jadwal_tiba_pesawat',
        'detail_pulang_pergi',
        'zona_waktu'
    ];

    public function ticketingMaskapai()
    {
        return $this->belongsTo(TicketingMaskapai::class);
    }

    public function ticketingPemesanan()
    {
        return $this->belongsTo(TicketingPemesanan::class);
    }

    public function ticketingVendor()
    {
        return $this->belongsTo(TicketingVendor::class);
    }

    public function ticketingBerangkatBandara()
    {
        return $this->belongsTo(TicketingBandara::class, 'tckt_bandara_berangkat_id');
    }

    public function ticketingTibaBandara()
    {
        return $this->belongsTo(TicketingBandara::class, 'tckt_bandara_tiba_id');
    }

    public function ticketingPenumpang()
    {
        return $this->belongsToMany(TicketingPenumpang::class, 'ticketing_penumpang_tiket_pesawat');
    }
}
