<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens\Pages\CreateReservasiDokumen;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens\Pages\EditReservasiDokumen;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens\Pages\ListReservasiDokumens;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens\Schemas\ReservasiDokumenForm;
use Modules\Ticketing\Filament\Clusters\Ticketing\Resources\ReservasiDokumens\Tables\ReservasiDokumensTable;
use Modules\Ticketing\Filament\Clusters\Ticketing\TicketingCluster;
use Modules\Ticketing\Models\TicketingPemesanan;
use UnitEnum;

class ReservasiDokumenResource extends Resource
{
    protected static ?string $model = TicketingPemesanan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;
    protected static UnitEnum|string|null $navigationGroup = 'Reservasi';
    protected static ?string $navigationLabel = 'Reservasi Dokumen';
    protected static ?string $slug = 'reservasi-dokumen';
    protected static ?int $navigationSort = 4;

    protected static ?string $cluster = TicketingCluster::class;

    protected static ?string $recordTitleAttribute = 'invoice';

    public static function form(Schema $schema): Schema
    {
        return ReservasiDokumenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReservasiDokumensTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReservasiDokumens::route('/'),
            'create' => CreateReservasiDokumen::route('/create'),
            'edit' => EditReservasiDokumen::route('/{record}/edit'),
        ];
    }
}