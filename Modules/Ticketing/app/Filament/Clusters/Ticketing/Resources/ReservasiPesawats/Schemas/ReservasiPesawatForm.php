<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Modules\Ticketing\Filament\Clusters\Ticketing\ReservasiFormPartials;
use Modules\Ticketing\Models\TicketingBandara;
use Modules\Ticketing\Models\TicketingMaskapai;
use Modules\Ticketing\Models\TicketingVendor;

class ReservasiPesawatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Pemesan')->schema(ReservasiFormPartials::kolomPemesan()),
                Section::make('Pembayar')->schema(ReservasiFormPartials::kolomPembayar()),
                Section::make('Harga')->schema(ReservasiFormPartials::kolomHarga()),
                Section::make('Maskapai Pergi (Keberangkatan)')->schema(self::kolomPenerbangan()),
                Section::make('Segmen Pulang (Round Trip)')->schema([
                    Repeater::make('detail_pulang_pergi')
                        ->label('Segmen Penerbangan Pulang')
                        ->schema(self::segmenPulangSchema())
                        ->grid(2)
                        ->defaultItems(0)
                        ->addActionLabel('+ Tambah Segmen Pulang')
                        ->reorderable()
                        ->collapsible(),
                ]),
            ]);
    }

    public static function kolomPenerbangan(): array
    {
        return self::segmenPulangSchema(false);
    }

    public static function segmenPulangSchema(bool $denganStatus = true): array
    {
        return [
            Grid::make(3)->schema(array_filter([
                $denganStatus
                    ? Select::make('status_pemesanan')
                        ->label('Status')
                        ->options(ReservasiFormPartials::statusOptions())
                        ->required()
                    : null,

                Select::make('maskapai_id')
                    ->label('Maskapai')
                    ->options(fn () => TicketingMaskapai::query()
                        ->where('is_active', true)
                        ->pluck('nama_maskapai', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('vendor_id')
                    ->label('Vendor')
                    ->options(fn () => TicketingVendor::query()
                        ->where('jenis_vendor', 1)
                        ->pluck('nama_vendor', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('bandara_berangkat_id')
                    ->label('Bandara Asal')
                    ->options(fn () => TicketingBandara::query()
                        ->where('is_active', true)
                        ->pluck('nama_bandara', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('bandara_tiba_id')
                    ->label('Bandara Tujuan')
                    ->options(fn () => TicketingBandara::query()
                        ->where('is_active', true)
                        ->pluck('nama_bandara', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('kelas')
                    ->label('Kelas')
                    ->required()
                    ->maxLength(255),

                TextInput::make('nomor_ticket')
                    ->label('Nomor Tiket')
                    ->required()
                    ->maxLength(255),

                TextInput::make('nomor_penerbangan')
                    ->label('Nomor Penerbangan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kode_booking_pesawat')
                    ->label('Kode Booking')
                    ->required()
                    ->maxLength(255),

                DateTimePicker::make('jadwal_berangkat_pesawat')
                    ->label('Waktu Keberangkatan')
                    ->seconds(false)
                    ->required(),

                DateTimePicker::make('jadwal_tiba_pesawat')
                    ->label('Waktu Tiba')
                    ->seconds(false)
                    ->required(),

                ReservasiFormPartials::kolomZonaWaktu(),
            ])),
        ];
    }
}