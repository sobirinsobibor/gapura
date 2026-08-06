<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\ReservasiPesawatResource;

class ReservasiPesawatsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->recordAction(null)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('#')
                    ->rowIndex(),

                TextColumn::make('invoice')
                    ->label('Invoice')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tanggal_pemesanan')
                    ->label('Tanggal')
                    ->date('d-m-Y')
                    ->sortable(),

                TextColumn::make('nama_customer')
                    ->label('Pemesan')
                    ->searchable(),

                TextColumn::make('ticketingUnitKerja.nama_unit_kerja')
                    ->label('Unit Kerja')
                    ->searchable(),

                TextColumn::make('ticketingTiketPesawat.ticketingMaskapai.nama_maskapai')
                    ->label('Maskapai')
                    ->searchable(),

TextColumn::make('harga_jual')
                    ->label('Harga Jual')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format((int) $state, 0, ',', '.'))
                    ->sortable(),

                TextColumn::make('pulang_pergi')
                    ->label('Pulang Pergi')
                    ->formatStateUsing(fn ($state) => $state ? 'Ya' : 'Tidak')
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'gray'),

                TextColumn::make('status_pemesanan')
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
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->button()
                    ->hiddenLabel()
                    ->url(fn ($record) => ReservasiPesawatResource::getUrl('edit', ['record' => $record])),
            ])
            ->toolbarActions([
                //
            ]);
    }
}