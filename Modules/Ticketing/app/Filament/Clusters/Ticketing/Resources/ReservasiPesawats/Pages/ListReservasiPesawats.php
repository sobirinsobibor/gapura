<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Modules\Ticketing\Filament\Clusters\Ticketing\Concerns\ListsReservasiByEntity;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\ReservasiPesawatResource;
use Modules\Ticketing\Models\TicketingTiketPesawat;

class ListReservasiPesawats extends ListRecords
{
    use ListsReservasiByEntity;

    protected static string $resource = ReservasiPesawatResource::class;

    protected function getTableQuery(): Builder
    {
        return ReservasiPesawatResource::getReservasiPesawatListQuery();
    }

    protected function getReservasiAnchorModel(): string
    {
        return TicketingTiketPesawat::class;
    }

    protected function getReservasiEagerLoads(): array
    {
        return [
            'ticketingPemesanan.ticketingKategoriPemesanan',
            'ticketingPemesanan.ticketingUnitKerja',
            'ticketingPemesanan.ticketingPembayaran',
            'ticketingVendor',
            'ticketingMaskapai',
            'ticketingBerangkatBandara',
            'ticketingTibaBandara',
        ];
    }

    protected function getReservasiExportColumns(): array
    {
        return array_merge($this->reservasiBaseExportColumns(), [
            'ticketingMaskapai.nama_maskapai' => 'Maskapai',
            'nomor_ticket' => 'Nomor Tiket',
            'nomor_penerbangan' => 'Nomor Penerbangan',
            'kode_booking_pesawat' => 'Kode Booking Pesawat',
            'kelas' => 'Kelas',
            'ticketingBerangkatBandara.kode_bandara' => 'Kode Bandara Berangkat',
            'ticketingBerangkatBandara.nama_bandara' => 'Bandara Berangkat',
            'ticketingTibaBandara.kode_bandara' => 'Kode Bandara Tiba',
            'ticketingTibaBandara.nama_bandara' => 'Bandara Tiba',
            'jadwal_berangkat_pesawat' => 'Jadwal Berangkat (Pesawat)',
            'jadwal_tiba_pesawat' => 'Jadwal Tiba (Pesawat)',
            'detail_pulang_pergi' => 'Detail Pulang Pergi',
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            $this->exportReservasiAction(),
            CreateAction::make()
                ->label('+ Tambah')
                ->button()
                ->createAnother(false),
        ];
    }
}