<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Modules\Ticketing\Filament\Clusters\Ticketing\Concerns\HasClusterSubNavigation;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\ReservasiPesawatResource;
use Modules\Ticketing\Services\ReservasiPesawatService;

class CreateReservasiPesawat extends CreateRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = ReservasiPesawatResource::class;

    protected static ?string $title = 'Tambah Reservasi Pesawat';

    protected static ?string $breadcrumb = 'Tambah Reservasi Pesawat';

    public function handleRecordCreation(array $data): Model
    {
        return app(ReservasiPesawatService::class)->create($data);
    }

    // #[Override]
    public function canCreateAnother(): bool
    {
        return false;
    }
}
