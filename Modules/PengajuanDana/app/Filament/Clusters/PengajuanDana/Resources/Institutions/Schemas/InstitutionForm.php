<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class InstitutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_institusi')
                    ->label('Nama Institusi')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                TextInput::make('kontak')
                    ->label('Kontak')
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(255),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
