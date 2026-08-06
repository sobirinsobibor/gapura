<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingKeretas\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingKeretas\TicketingKeretaResource;

class ListTicketingKeretas extends ListRecords
{
    protected static string $resource = TicketingKeretaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->createAnother(false)
                ->Label('+ Tambah')
                ->modalHeading('Tambah Kereta'),
        ];
    }
}
