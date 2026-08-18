<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\BankAsals\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns\HasClusterSubNavigation;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\BankAsals\BankAsalResource;

class CreateBankAsal extends CreateRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = BankAsalResource::class;

    protected static bool $canCreateAnother = false;
}
