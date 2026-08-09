<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Pages;

use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Modules\Ticketing\Filament\Clusters\Ticketing\Concerns\HasClusterSubNavigation;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\ReservasiPesawatResource;
use Modules\Ticketing\Models\TicketingPemesanan;
use Modules\Ticketing\Services\ReservasiPesawatService;

class EditReservasiPesawat extends EditRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = ReservasiPesawatResource::class;

    public function handleRecordUpdate(Model $record, array $data): Model
    {
        /** @var TicketingPemesanan $record */
        return app(ReservasiPesawatService::class)->update($record, $data);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        /** @var TicketingPemesanan $record */
        $record = $this->record;
        $tiket = $record->ticketingTiketPesawat;
        $pembayaran = $record->ticketingPembayaran;

        $data['nama_customer'] = $record->nama_customer;
        $data['unit_kerja_pemesan'] = $record->tckt_unit_kerja_id;
        $data['status_pemesanan'] = $record->status_pemesanan;
        $data['kategori_pemesanan_id'] = $record->tckt_kategori_pemesanan_id;
        $data['tanggal_pemesanan'] = $record->tanggal_pemesanan;
        $data['harga_beli'] = $record->harga_beli;
        $data['harga_publish'] = $record->harga_publish;
        $data['harga_jual'] = $record->harga_jual;
        $data['pulang_pergi'] = $record->pulang_pergi;

        $data['nama_pembayar'] = $pembayaran?->nama_pembayar;
        $data['unit_kerja_pembayar'] = $pembayaran?->tckt_unit_kerja_id;

        if ($tiket) {
            $data['maskapai_id'] = $tiket->tckt_maskapai_id;
            $data['vendor_id'] = $tiket->tckt_vendor_id;
            $data['bandara_berangkat_id'] = $tiket->tckt_bandara_berangkat_id;
            $data['bandara_tiba_id'] = $tiket->tckt_bandara_tiba_id;
            $data['nomor_ticket'] = $tiket->nomor_ticket;
            $data['nomor_penerbangan'] = $tiket->nomor_penerbangan;
            $data['kode_booking_pesawat'] = $tiket->kode_booking_pesawat;
            $data['kelas'] = $tiket->kelas;
            $data['jadwal_berangkat_pesawat'] = $tiket->jadwal_berangkat_pesawat;
            $data['jadwal_tiba_pesawat'] = $tiket->jadwal_tiba_pesawat;
            $data['zona_waktu'] = $tiket->zona_waktu;
            $data['zona_waktu_kedatangan'] = $tiket->zona_waktu_kedatangan;

            $detailPulangPergi = json_decode((string) $tiket->detail_pulang_pergi, true) ?: [];
            if (isset($detailPulangPergi['segmen']) && is_array($detailPulangPergi['segmen'])) {
                $data['status_pemesanan_pulang_pergi'] = $detailPulangPergi['status_pemesanan_pulang_pergi'] ?? null;
                $data['detail_pulang_pergi'] = ['segmen' => $detailPulangPergi['segmen']];
            } else {
                $data['detail_pulang_pergi'] = ['segmen' => $detailPulangPergi];
            }
        }

        return $data;
    }
}