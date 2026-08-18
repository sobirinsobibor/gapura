<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\BankAsals\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BankAsalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_bank')
                    ->label('Nama Bank')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),

                TextInput::make('no_rekening')
                    ->label('Nomor Rekening')
                    ->columnSpanFull()
                    ->maxLength(255),

                ColorPicker::make('color')
                    ->label('Warna')
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
