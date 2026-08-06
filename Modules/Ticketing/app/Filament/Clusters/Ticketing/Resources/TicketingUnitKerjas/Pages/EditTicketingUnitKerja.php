<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingUnitKerjas\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingUnitKerjas\TicketingUnitKerjaResource;

class EditTicketingUnitKerja extends EditRecord
{
    protected static string $resource = TicketingUnitKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
