<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\BankAsals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class BankAsalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->recordAction(null)
            ->defaultSort('nama_bank')
            ->columns([
                TextColumn::make('#')
                    ->rowIndex(),

                TextColumn::make('nama_bank')
                    ->label('Nama Bank')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('no_rekening')
                    ->label('Nomor Rekening')
                    ->searchable(),

                ColorColumn::make('color')
                    ->label('Warna'),

                ToggleColumn::make('is_active')
                    ->label('Aktif'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->button()->hiddenLabel()->modalHeading('Edit Bank Asal'),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
