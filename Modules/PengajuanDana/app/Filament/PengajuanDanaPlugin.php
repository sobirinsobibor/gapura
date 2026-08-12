<?php

namespace Modules\PengajuanDana\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

class PengajuanDanaPlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'PengajuanDana';
    }

    public function getId(): string
    {
        return 'pengajuandana';
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
