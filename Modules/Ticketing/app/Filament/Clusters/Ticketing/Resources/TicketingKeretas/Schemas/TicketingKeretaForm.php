<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingKeretas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TicketingKeretaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_kereta')
                    ->label('Nama Kereta')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
            ]);
    }
}
