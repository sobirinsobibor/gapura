<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\BankResource;

class ListBanks extends ListRecords
{
    protected static string $resource = BankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
