<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions;

use App\Filament\Concerns\HasRbacPermission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\PengajuanDanaCluster;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\Pages\CreateInstitution;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\Pages\EditInstitution;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\Pages\ListInstitutions;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\Schemas\InstitutionForm;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Institutions\Tables\InstitutionsTable;
use Modules\PengajuanDana\Models\Institution;
use UnitEnum;

class InstitutionResource extends Resource
{
    use HasRbacPermission;

    protected static ?string $model = Institution::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $navigationLabel = 'Institusi';

    protected static ?string $slug = 'institutions';

    protected static ?int $navigationSort = 2;

    protected static ?string $cluster = PengajuanDanaCluster::class;

    protected static ?string $recordTitleAttribute = 'nama_institusi';

    protected static UnitEnum|string|null $navigationGroup = 'Master Data';

    public static function form(Schema $schema): Schema
    {
        return InstitutionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InstitutionsTable::configure($table);
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
            'index' => ListInstitutions::route('/'),
            // 'create' => CreateInstitution::route('/create'),
            // 'edit' => EditInstitution::route('/{record}/edit'),
        ];
    }
}
