<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class BanksTable
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

                TextColumn::make('kode_bank')
                    ->label('Kode Bank')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama_bank')
                    ->label('Nama Bank')
                    ->searchable()
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Aktif'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->button()->hiddenLabel()->modalHeading('Edit Bank'),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
