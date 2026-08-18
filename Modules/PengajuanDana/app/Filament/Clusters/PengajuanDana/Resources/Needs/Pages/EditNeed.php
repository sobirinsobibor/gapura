<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns\HasClusterSubNavigation;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\NeedResource;

class EditNeed extends EditRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = NeedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
