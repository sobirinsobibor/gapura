<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\BankAsals\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns\HasClusterSubNavigation;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\BankAsals\BankAsalResource;

class EditBankAsal extends EditRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = BankAsalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
