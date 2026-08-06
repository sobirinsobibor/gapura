<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingStasiuns\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingStasiuns\TicketingStasiunResource;

class EditTicketingStasiun extends EditRecord
{
    protected static string $resource = TicketingStasiunResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
