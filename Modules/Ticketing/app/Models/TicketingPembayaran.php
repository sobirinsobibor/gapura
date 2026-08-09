<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingPembayaranFactory;

class TicketingPembayaran extends Model
{
    use HasFactory;

    protected $table ='ticketing_pembayaran';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'tckt_unit_kerja_id',
        'tckt_pemesanan_id',
        'nama_pembayar'
    ];

    public function ticketingPemesanan()
    {
        return $this->hasOne(TicketingPemesanan::class);
    }

    public function ticketingUnitKerja()
    {
        return $this->belongsTo(TicketingUnitKerja::class, 'tckt_unit_kerja_id');
    }

    public function ticketingPembayaranPenumpang()
    {
        return $this->hasMany(TicketingPembayaranPenumpang::class);
    }
}
