<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Concerns;

use Filament\Tables\Columns\TextColumn;

trait ReservasiToggleableColumns
{
    protected static function reservasiCommonToggleableColumns(array $exclude = []): array
    {
        $columns = [
            TextColumn::make('ticketingPemesanan.ticketingKategoriPemesanan.nama_kategori')
                ->label('Kategori')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('ticketingPemesanan.pulang_pergi')
                ->label('Pulang Pergi')
                ->formatStateUsing(fn ($state) => $state ? 'Ya' : 'Tidak')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('ticketingPemesanan.harga_beli')
                ->label('Harga Beli')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format((int) $state, 0, ',', '.'))
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('ticketingPemesanan.harga_publish')
                ->label('Harga Publish')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format((int) $state, 0, ',', '.'))
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('ticketingVendor.nama_vendor')
                ->label('Vendor')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('ticketingVendor.jenis_vendor')
                ->label('Jenis Vendor')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('ticketingPemesanan.creator.name')
                ->label('Dibuat Oleh')
                ->searchable()
                ->sortable()
                ->toggleable(),
        ];

        return array_values(array_filter(
            $columns,
            fn (TextColumn $column): bool => ! in_array($column->getName(), $exclude, true),
        ));
    }
}
