<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingPembayaranPenumpangFactory;

class TicketingPembayaranPenumpang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'tckt_penumpang_id',
        'tckt_pembayaran_id',
        'jumlah_membayar',
        'user_id',
        'bukti_pembayaran',
        'tgl_membayar',
        'status_bukti_bayar'
    ];

    public function ticketingPembayaran()
    {
        return $this->belongsTo(TicketingPembayaran::class);
    }

    public function ticketingPenumpang()
    {
        return $this->belongsTo(TicketingPenumpang::class);
    }
}
