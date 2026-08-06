<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingVendors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class TicketingVendorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->recordAction(null)
            ->columns([
                TextColumn::make('#')
                    ->rowIndex(),
                TextColumn::make('nama_vendor')
                    ->label('Nama Vendor')
                    ->searchable(),
                TextColumn::make('jenis_vendor')
                    ->label('Jenis Vendor')
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->toggleable()
                    ->onIcon('heroicon-s-check-circle')
                    ->offIcon('heroicon-s-x-circle')
                    ->onColor('success')
                    ->offColor('danger'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()->button()->hiddenLabel()->modalHeading('Edit Vendor'),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
