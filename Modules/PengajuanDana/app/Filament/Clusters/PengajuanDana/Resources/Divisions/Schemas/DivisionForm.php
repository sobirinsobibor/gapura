<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DivisionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Section::make('Data Divisi')->schema([
                    TextInput::make('kode_divisi')
                        ->label('Kode Divisi')
                        ->maxLength(20),

                    TextInput::make('nama_divisi')
                        ->label('Nama Divisi')
                        ->required()
                        ->maxLength(255),

                    Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                // ])
            ]);
    }
}
