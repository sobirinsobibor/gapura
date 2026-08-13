<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions;

use App\Filament\Concerns\HasRbacPermission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\PengajuanDanaCluster;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\Pages\CreateDivision;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\Pages\EditDivision;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\Pages\ListDivisions;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\Schemas\DivisionForm;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Divisions\Tables\DivisionsTable;
use Modules\PengajuanDana\Models\Division;
use UnitEnum;

class DivisionResource extends Resource
{
    use HasRbacPermission;

    protected static ?string $model = Division::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static ?string $navigationLabel = 'Divisi';

    protected static ?string $slug = 'divisions';

    protected static ?int $navigationSort = 1;

    protected static ?string $cluster = PengajuanDanaCluster::class;

    protected static ?string $recordTitleAttribute = 'nama_divisi';

    protected static UnitEnum|string|null $navigationGroup = 'Master Data';

    public static function form(Schema $schema): Schema
    {
        return DivisionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DivisionsTable::configure($table);
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
            'index' => ListDivisions::route('/'),
            // 'create' => CreateDivision::route('/create'),
            // 'edit' => EditDivision::route('/{record}/edit'),
        ];
    }
}
