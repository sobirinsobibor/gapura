<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Modules\Ticketing\Models\TicketingKategoriPemesanan;
use Modules\Ticketing\Models\TicketingUnitKerja;

class ReservasiFormPartials
{
    public static function statusOptions(): array
    {
        return [
            'Confirmed' => 'Confirmed',
            'Canceled' => 'Canceled',
            'No show' => 'No show',
            'Refund' => 'Refund',
            'Reroute' => 'Reroute',
            'Open' => 'Open',
            'Reschedule' => 'Reschedule',
        ];
    }

    public static function zonaWaktuOptions(): array
    {
        $options = [
            'WIB'  => 'WIB (GMT+7)',
            'WITA' => 'WITA (GMT+8)',
            'WIT'  => 'WIT (GMT+9)',
        ];

        for ($i = 0; $i <= 14; $i++) {
            if (in_array($i, [7, 8, 9], true)) {
                continue;
            }
            $options['GMT+' . $i] = 'GMT+' . $i;
        }

        return $options;
    }

    public static function kolomZonaWaktu(): Select
    {
        return Select::make('zona_waktu')
            ->label('Zona Waktu')
            ->options(self::zonaWaktuOptions())
            ->default('WIB')
            ->helperText('Waktu setempat — WIB (GMT+7), WITA (GMT+8), WIT (GMT+9)')
            ->required();
    }

    public static function kolomPemesan(): array
    {
        return [
            Grid::make(2)->schema([
                DatePicker::make('tanggal_pemesanan')
                    ->label('Tanggal Pemesanan')
                    ->default(now())
                    ->required(),

                TextInput::make('nama_customer')
                    ->label('Nama Pemesan')
                    ->required()
                    ->maxLength(255),

                Select::make('unit_kerja_pemesan')
                    ->label('Unit Kerja Pemesan')
                    ->options(fn () => TicketingUnitKerja::query()
                        ->where('is_active', true)
                        ->pluck('nama_unit_kerja', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('status_pemesanan')
                    ->label('Status Pemesanan')
                    ->options(self::statusOptions())
                    ->required(),

                Select::make('kategori_pemesanan_id')
                    ->label('Kategori Pemesanan')
                    ->options(fn () => TicketingKategoriPemesanan::pluck('nama_kategori', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
            ]),
        ];
    }

    public static function kolomPembayar(): array
    {
        return [
            Grid::make(2)->schema([
                TextInput::make('nama_pembayar')
                    ->label('Nama Pembayar')
                    ->required()
                    ->maxLength(255),

                Select::make('unit_kerja_pembayar')
                    ->label('Unit Kerja Pembayar')
                    ->options(fn () => TicketingUnitKerja::query()
                        ->where('is_active', true)
                        ->pluck('nama_unit_kerja', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
            ]),
        ];
    }

    public static function kolomHarga(): array
    {
        return [
            Grid::make(3)->schema([
                TextInput::make('harga_beli')
                    ->label('Harga NTA (Beli)')
                    ->numeric()
                    ->required(),

                TextInput::make('harga_publish')
                    ->label('Komisi (Publish)')
                    ->numeric()
                    ->required(),

                TextInput::make('harga_jual')
                    ->label('Harga Jual')
                    ->numeric()
                    ->required(),
            ]),
        ];
    }
}