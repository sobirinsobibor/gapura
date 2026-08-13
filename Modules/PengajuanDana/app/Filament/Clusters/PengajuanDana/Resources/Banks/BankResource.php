<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks;

use App\Filament\Concerns\HasRbacPermission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\PengajuanDanaCluster;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\Pages\CreateBank;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\Pages\EditBank;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\Pages\ListBanks;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\Schemas\BankForm;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Banks\Tables\BanksTable;
use Modules\PengajuanDana\Models\Bank;
use UnitEnum;

class BankResource extends Resource
{
    use HasRbacPermission;

    protected static ?string $model = Bank::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingLibrary;

    protected static ?string $navigationLabel = 'Bank';

    protected static ?string $slug = 'banks';

    protected static ?int $navigationSort = 3;

    protected static ?string $cluster = PengajuanDanaCluster::class;

    protected static ?string $recordTitleAttribute = 'nama_bank';

    protected static UnitEnum|string|null $navigationGroup = 'Master Data';

    public static function form(Schema $schema): Schema
    {
        return BankForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BanksTable::configure($table);
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
            'index' => ListBanks::route('/'),
            // 'create' => CreateBank::route('/create'),
            // 'edit' => EditBank::route('/{record}/edit'),
        ];
    }
}
