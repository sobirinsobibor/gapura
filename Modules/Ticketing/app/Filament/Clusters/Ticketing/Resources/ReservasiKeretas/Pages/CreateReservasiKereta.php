<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiKeretas\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Modules\Ticketing\Filament\Clusters\Ticketing\Concerns\HasClusterSubNavigation;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiKeretas\ReservasiKeretaResource;
use Modules\Ticketing\Services\ReservasiKeretaService;

class CreateReservasiKereta extends CreateRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = ReservasiKeretaResource::class;

    protected static ?string $title = 'Tambah Reservasi Kereta';

    protected static ?string $breadcrumb = 'Tambah Reservasi Kereta';

    public function handleRecordCreation(array $data): Model
    {
        return app(ReservasiKeretaService::class)->create($data);
    }

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
