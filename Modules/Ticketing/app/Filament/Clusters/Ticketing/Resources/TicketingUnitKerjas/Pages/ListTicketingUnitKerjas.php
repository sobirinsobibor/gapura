<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingUnitKerjas\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\TicketingUnitKerjas\TicketingUnitKerjaResource;

class ListTicketingUnitKerjas extends ListRecords
{
    protected static string $resource = TicketingUnitKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('+ Tambah')
                ->createAnother(false)
                ->modalHeading('Tambah Unit Kerja'),
        ];
    }
}
