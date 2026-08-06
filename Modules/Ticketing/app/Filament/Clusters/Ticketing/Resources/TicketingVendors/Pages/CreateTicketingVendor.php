<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingVendors\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingVendors\TicketingVendorResource;

class CreateTicketingVendor extends CreateRecord
{
    protected static string $resource = TicketingVendorResource::class;
}
