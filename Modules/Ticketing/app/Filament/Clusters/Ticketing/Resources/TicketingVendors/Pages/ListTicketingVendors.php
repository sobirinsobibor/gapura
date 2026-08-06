<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingVendors\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingVendors\TicketingVendorResource;

class ListTicketingVendors extends ListRecords
{
    protected static string $resource = TicketingVendorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('+ Tambah')
                ->button()->createAnother(false)
                ->modalHeading('Tambah Vendor'),
        ];
    }
}
