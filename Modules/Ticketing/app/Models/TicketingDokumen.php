<?php

namespace Modules\Ticketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ticketing\Database\Factories\TicketingDokumenFactory;

class TicketingDokumen extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'tckt_vendor_id',
        'tckt_pemesanan_id',
        'jenis_dokumen',
        'keterangan'
    ];

    public function ticketingPemesanan()
    {
        return $this->belongsTo(TicketingPemesanan::class);
    }

    public function ticketingPenumpang()
    {
        return $this->belongsToMany(TicketingPenumpang::class, 'penumpang_dokumen');
    }

    public function ticketingVendor()
    {
        return $this->belongsTo(TicketingVendor::class);
    }
}
