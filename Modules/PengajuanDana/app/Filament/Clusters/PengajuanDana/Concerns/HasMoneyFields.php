<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns;

trait HasMoneyFields
{
    private static function parseRupiah(mixed $value): float
    {
        return (float) str_replace(',', '', (string) ($value ?? 0));
    }
}
