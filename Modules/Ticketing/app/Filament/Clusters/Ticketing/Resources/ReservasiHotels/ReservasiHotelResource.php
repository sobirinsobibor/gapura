<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiHotels;

use BackedEnum;
use Filament\Resources\Resource;

use App\Filament\Concerns\HasRbacPermission;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiHotels\Pages\CreateReservasiHotel;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiHotels\Pages\EditReservasiHotel;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiHotels\Pages\ListReservasiHotels;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiHotels\RelationManagers\PenumpangHotelRelationManager;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiHotels\Schemas\ReservasiHotelForm;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiHotels\Tables\ReservasiHotelsTable;
use Modules\Ticketing\Filament\Clusters\Ticketing\TicketingCluster;
use Modules\Ticketing\Models\TicketingPemesanan;
use UnitEnum;

class ReservasiHotelResource extends Resource
{
    use HasRbacPermission;

    protected static ?string $model = TicketingPemesanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;
    protected static UnitEnum|string|null $navigationGroup = 'Reservasi';
    protected static ?string $navigationLabel = 'Reservasi Hotel';
    protected static ?string $slug = 'reservasi-hotel';
    protected static ?int $navigationSort = 3;

    protected static ?string $cluster = TicketingCluster::class;

    protected static ?string $recordTitleAttribute = 'invoice';

    public static function form(Schema $schema): Schema
    {
        return ReservasiHotelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReservasiHotelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            PenumpangHotelRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReservasiHotels::route('/'),
            'create' => CreateReservasiHotel::route('/create'),
            'edit' => EditReservasiHotel::route('/{record}/edit'),
        ];
    }
}