<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingStasiuns\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingStasiuns\TicketingStasiunResource;

class ListTicketingStasiuns extends ListRecords
{
    protected static string $resource = TicketingStasiunResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('+ Tambah')
                ->modalHeading('Tambah Stasiun')
                ->createAnother(false),
        ];
    }
}
