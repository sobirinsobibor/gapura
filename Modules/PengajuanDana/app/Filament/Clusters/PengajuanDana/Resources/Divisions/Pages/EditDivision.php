<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\DivisionResource;

class EditDivision extends EditRecord
{
    protected static string $resource = DivisionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
