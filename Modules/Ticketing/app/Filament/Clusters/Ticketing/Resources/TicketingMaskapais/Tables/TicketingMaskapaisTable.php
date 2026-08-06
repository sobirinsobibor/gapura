<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingMaskapais\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class TicketingMaskapaisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->recordAction(null)
            ->columns([
                TextColumn::make('#')
                    ->rowIndex(),

                TextColumn::make('nama_maskapai')
                    ->label('Nama Maskapai')
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
                EditAction::make()->button()->hiddenLabel()->modalHeading('Edit Maskapai'),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
