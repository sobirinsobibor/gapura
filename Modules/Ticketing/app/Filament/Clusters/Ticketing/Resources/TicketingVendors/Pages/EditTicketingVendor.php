<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingVendors\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingVendors\TicketingVendorResource;

class EditTicketingVendor extends EditRecord
{
    protected static string $resource = TicketingVendorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
