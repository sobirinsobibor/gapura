<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingUnitKerjas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TicketingUnitKerjaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_unit_kerja')
                    ->label('Unit Kerja')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
            ]);
    }
}
