<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class InstitutionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->recordAction(null)
            ->defaultSort('nama_institusi')
            ->columns([
                TextColumn::make('#')
                    ->rowIndex(),

                TextColumn::make('kode_institusi')
                    ->label('Kode Institusi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama_institusi')
                    ->label('Nama Institusi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kontak')
                    ->label('Kontak')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->toggleable(),

                ToggleColumn::make('is_active')
                    ->label('Aktif'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->button()->hiddenLabel()->modalHeading('Edit Institusi'),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
