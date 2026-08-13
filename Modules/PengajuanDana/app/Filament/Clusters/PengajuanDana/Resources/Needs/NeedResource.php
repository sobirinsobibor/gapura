<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs;

use App\Filament\Concerns\HasRbacPermission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\PengajuanDanaCluster;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\Pages\CreateNeed;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\Pages\EditNeed;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\Pages\ListNeeds;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\Schemas\NeedForm;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Needs\Tables\NeedsTable;
use Modules\PengajuanDana\Models\Need;
use UnitEnum;

class NeedResource extends Resource
{
    use HasRbacPermission;

    protected static ?string $model = Need::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $navigationLabel = 'Kebutuhan';

    protected static ?string $slug = 'needs';

    protected static ?int $navigationSort = 5;

    protected static ?string $cluster = PengajuanDanaCluster::class;

    protected static ?string $recordTitleAttribute = 'nama_kebutuhan';

    protected static UnitEnum|string|null $navigationGroup = 'Master Data';

    public static function form(Schema $schema): Schema
    {
        return NeedForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NeedsTable::configure($table);
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
            'index' => ListNeeds::route('/'),
            // 'create' => CreateNeed::route('/create'),
            // 'edit' => EditNeed::route('/{record}/edit'),
        ];
    }
}
