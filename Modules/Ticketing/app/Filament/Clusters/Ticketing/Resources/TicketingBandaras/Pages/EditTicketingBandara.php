<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingBandaras\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingBandaras\TicketingBandaraResource;

class EditTicketingBandara extends EditRecord
{
    protected static string $resource = TicketingBandaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
