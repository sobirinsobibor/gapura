<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats;

use BackedEnum;
use Filament\Resources\Resource;

use App\Filament\Concerns\HasRbacPermission;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Pages\CreateReservasiPesawat;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Pages\EditReservasiPesawat;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Pages\ListReservasiPesawats;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\RelationManagers\PenumpangPesawatRelationManager;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Schemas\ReservasiPesawatForm;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiPesawats\Tables\ReservasiPesawatsTable;
use Modules\Ticketing\Filament\Clusters\Ticketing\TicketingCluster;
use Modules\Ticketing\Models\TicketingPemesanan;
use UnitEnum;

class ReservasiPesawatResource extends Resource
{
    use HasRbacPermission;

    protected static ?string $model = TicketingPemesanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRocketLaunch;
    protected static UnitEnum|string|null $navigationGroup = 'Reservasi';
    protected static ?string $navigationLabel = 'Reservasi Pesawat';
    protected static ?string $slug = 'reservasi-pesawat';
    protected static ?int $navigationSort = 1;

    protected static ?string $cluster = TicketingCluster::class;

    protected static ?string $recordTitleAttribute = 'invoice';

    public static function form(Schema $schema): Schema
    {
        return ReservasiPesawatForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReservasiPesawatsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            PenumpangPesawatRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReservasiPesawats::route('/'),
            'create' => CreateReservasiPesawat::route('/create'),
            'edit' => EditReservasiPesawat::route('/{record}/edit'),
        ];
    }
}