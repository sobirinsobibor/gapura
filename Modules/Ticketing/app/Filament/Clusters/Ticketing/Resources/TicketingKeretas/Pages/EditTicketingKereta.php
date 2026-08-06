<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingKeretas\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingKeretas\TicketingKeretaResource;

class EditTicketingKereta extends EditRecord
{
    protected static string $resource = TicketingKeretaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
