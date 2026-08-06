<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingBandaras\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingBandaras\TicketingBandaraResource;

class ListTicketingBandaras extends ListRecords
{
    protected static string $resource = TicketingBandaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->createAnother(false)
                ->Label('+ Tambah')
                ->modalHeading('Tambah Bandar Udara'),
        ];
    }
}
