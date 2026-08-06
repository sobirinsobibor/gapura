<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingMaskapais\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingMaskapais\TicketingMaskapaiResource;

class EditTicketingMaskapai extends EditRecord
{
    protected static string $resource = TicketingMaskapaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
