<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Ticketing\Filament\Clusters\Ticketing\Filters\KategoriPemesananFilter;
use Modules\Ticketing\Filament\Clusters\Ticketing\Filters\TanggalPemesananFilter;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens\ReservasiDokumenResource;

class ReservasiDokumensTable
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
                TextColumn::make('#')->rowIndex(),

                TextColumn::make('ticketingPemesanan.invoice')
                    ->label('Invoice')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('ticketingPemesanan.tanggal_pemesanan')
                    ->label('Tanggal')
                    ->date('d-m-Y')
                    ->sortable(),

                TextColumn::make('ticketingPemesanan.nama_customer')
                    ->label('Pemesan')
                    ->searchable(),

                TextColumn::make('ticketingPemesanan.ticketingUnitKerja.nama_unit_kerja')
                    ->label('Unit Kerja')
                    ->searchable(),

                TextColumn::make('jenis_dokumen')
                    ->label('Jenis Dokumen')
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
                    ->url(fn ($record) => ReservasiDokumenResource::getUrl('edit', ['record' => $record->ticketingPemesanan])),
            ])
            ->toolbarActions([]);
    }
}