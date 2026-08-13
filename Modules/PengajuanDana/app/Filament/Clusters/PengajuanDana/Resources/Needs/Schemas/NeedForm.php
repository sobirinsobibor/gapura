<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NeedForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Data Kebutuhan')->schema([
                    TextInput::make('kode_kebutuhan')
                        ->label('Kode Kebutuhan')
                        ->maxLength(20),

                    TextInput::make('nama_kebutuhan')
                        ->label('Nama Kebutuhan')
                        ->required()
                        ->maxLength(255),

                    Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ]),
            ]);
    }
}
