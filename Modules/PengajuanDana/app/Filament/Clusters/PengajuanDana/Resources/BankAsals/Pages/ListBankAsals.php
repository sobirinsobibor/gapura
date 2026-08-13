<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\BankAsals\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\BankAsals\BankAsalResource;

class ListBankAsals extends ListRecords
{
    protected static string $resource = BankAsalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
