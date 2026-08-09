<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiKeretas;

use BackedEnum;
use Filament\Resources\Resource;

use App\Filament\Concerns\HasRbacPermission;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiKeretas\Pages\CreateReservasiKereta;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiKeretas\Pages\EditReservasiKereta;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiKeretas\Pages\ListReservasiKeretas;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiKeretas\RelationManagers\PenumpangKeretaRelationManager;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiKeretas\Schemas\ReservasiKeretaForm;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiKeretas\Tables\ReservasiKeretasTable;
use Modules\Ticketing\Filament\Clusters\Ticketing\TicketingCluster;
use Modules\Ticketing\Models\TicketingPemesanan;
use UnitEnum;

class ReservasiKeretaResource extends Resource
{
    use HasRbacPermission;

    protected static ?string $model = TicketingPemesanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTruck;
    protected static UnitEnum|string|null $navigationGroup = 'Reservasi';
    protected static ?string $navigationLabel = 'Reservasi Kereta';
    protected static ?string $slug = 'reservasi-kereta';
    protected static ?int $navigationSort = 2;

    protected static ?string $cluster = TicketingCluster::class;

    protected static ?string $recordTitleAttribute = 'invoice';

    public static function form(Schema $schema): Schema
    {
        return ReservasiKeretaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReservasiKeretasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            PenumpangKeretaRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReservasiKeretas::route('/'),
            'create' => CreateReservasiKereta::route('/create'),
            'edit' => EditReservasiKereta::route('/{record}/edit'),
        ];
    }
}