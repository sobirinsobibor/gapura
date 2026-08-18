<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns\HasClusterSubNavigation;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\BankResource;

class CreateBank extends CreateRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = BankResource::class;

    protected static bool $canCreateAnother = false;
}
