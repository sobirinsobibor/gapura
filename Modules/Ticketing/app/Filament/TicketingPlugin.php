<?php

namespace Modules\Ticketing\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

class TicketingPlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Ticketing';
    }

    public function getId(): string
    {
        return 'ticketing';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
