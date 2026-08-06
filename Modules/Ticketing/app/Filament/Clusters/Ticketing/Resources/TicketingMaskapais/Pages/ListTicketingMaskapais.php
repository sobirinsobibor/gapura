<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingMaskapais\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingMaskapais\TicketingMaskapaiResource;

class ListTicketingMaskapais extends ListRecords
{
    protected static string $resource = TicketingMaskapaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('+ Tambah')
                ->button()
                ->createAnother(false)
                ->modalHeading('Tambah Maskapai'),
        ];
    }
}
