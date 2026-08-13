<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\BankResource;

class EditBank extends EditRecord
{
    protected static string $resource = BankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
