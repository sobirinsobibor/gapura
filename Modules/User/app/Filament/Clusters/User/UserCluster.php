<?php

namespace Modules\User\Filament\Clusters\User;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;

class UserCluster extends Cluster
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;

    protected static ?string $clusterBreadcrumb = 'Pengguna';

    protected static ?string $navigationLabel = 'Pengguna';

    protected static ?string $slug = 'pengguna'; // ganti dari default

    protected static ?int $navigationSort = null;

    protected static ?string $recordTitleAttribute = 'Pengguna';

    //saya mau sidebarCollapsibleOnDesktop 
    protected static bool $sidebarCollapsibleOnDesktop = true; // <- ini yang mungkin hilang/salah path
}
