<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class NeedsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->recordAction(null)
            ->defaultSort('nama_kebutuhan')
            ->columns([
                TextColumn::make('#')
                    ->rowIndex(),

                TextColumn::make('kode_kebutuhan')
                    ->label('Kode Kebutuhan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama_kebutuhan')
                    ->label('Nama Kebutuhan')
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
                    ->button()->hiddenLabel()->modalHeading('Edit Kebutuhan'),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
