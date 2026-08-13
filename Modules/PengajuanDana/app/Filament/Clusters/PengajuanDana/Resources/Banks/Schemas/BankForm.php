<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BankForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Data Bank')->schema([
                    TextInput::make('kode_bank')
                        ->label('Kode Bank')
                        ->maxLength(20),

                    TextInput::make('nama_bank')
                        ->label('Nama Bank')
                        ->required()
                        ->maxLength(255),

                    Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ]),
            ]);
    }
}
