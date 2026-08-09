<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Ticketing\Filament\Clusters\Ticketing\Filters\KategoriPemesananFilter;
use Modules\Ticketing\Filament\Clusters\Ticketing\Filters\TanggalPemesananFilter;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\ReservasiPesawatResource;

class ReservasiPesawatsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->recordAction(null)
            ->defaultSort('created_at', 'desc')
            ->filtersLayout(FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->columns([
                TextColumn::make('#')
                    ->rowIndex(),

                TextColumn::make('ticketingPemesanan.invoice')
                    ->label('Invoice')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('ticketingPemesanan.nama_customer')
                    ->label('Pemesan')
                    ->searchable(),

                TextColumn::make('ticketingPemesanan.ticketingUnitKerja.nama_unit_kerja')
                    ->label('Unit Kerja')
                    ->searchable(),

                TextColumn::make('ticketingMaskapai.nama_maskapai')
                    ->label('Maskapai')
                    ->searchable(),

                TextColumn::make('jadwal_berangkat_pesawat')
                    ->label('Berangkat')
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),

                TextColumn::make('ticketingBerangkatBandara.kode_bandara')
                    ->label('Keberangkatan')
                    ->searchable(),

                TextColumn::make('ticketingTibaBandara.kode_bandara')
                    ->label('Kedatangan')
                    ->searchable(),

                TextColumn::make('ticketingPemesanan.harga_jual')
                    ->label('Harga Jual')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format((int) $state, 0, ',', '.'))
                    ->sortable(),

                TextColumn::make('ticketingPemesanan.status_pemesanan')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Confirmed' => 'success',
                        'Canceled', 'Refund' => 'danger',
                        default => 'info',
                    })
                    ->sortable(),
            ])
            ->filters([
                TanggalPemesananFilter::make(),
                KategoriPemesananFilter::make(),
            ])
            ->recordActions([
                EditAction::make()
                    ->button()
                    ->hiddenLabel()
                    ->url(fn ($record) => ReservasiPesawatResource::getUrl('edit', ['record' => $record->ticketingPemesanan])),
            ])
            ->toolbarActions([
                //
            ]);
    }
}