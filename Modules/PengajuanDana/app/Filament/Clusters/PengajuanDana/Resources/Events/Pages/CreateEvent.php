<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Events\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Events\EventResource;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;
}
