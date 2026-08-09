<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Modules\Ticketing\Filament\Clusters\Ticketing\Concerns\HasClusterSubNavigation;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens\ReservasiDokumenResource;
use Modules\Ticketing\Services\ReservasiDokumenService;

class CreateReservasiDokumen extends CreateRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = ReservasiDokumenResource::class;

    public function handleRecordCreation(array $data): Model
    {
        return app(ReservasiDokumenService::class)->create($data);
    }

    //cancreate another
    

    // protected function getRedirectUrl(): string
    // {
    //     return $this->getResource()::getUrl('edit', ['record' => $this->record]);
    // }

    // #[Override]
    public function canCreateAnother(): bool
    {
        return false;
    }
}