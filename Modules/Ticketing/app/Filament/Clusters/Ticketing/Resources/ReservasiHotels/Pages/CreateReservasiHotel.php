<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiHotels\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Modules\Ticketing\Filament\Clusters\Ticketing\Concerns\HasClusterSubNavigation;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiHotels\ReservasiHotelResource;
use Modules\Ticketing\Services\ReservasiHotelService;
use Override;

class CreateReservasiHotel extends CreateRecord
{
    use HasClusterSubNavigation;

    protected static string $resource = ReservasiHotelResource::class;

    public function handleRecordCreation(array $data): Model
    {
        return app(ReservasiHotelService::class)->create($data);
    }

    // #[Override]
    public function canCreateAnother(): bool
    {
        return false;
    }
}