<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Filters;

use Illuminate\Database\Eloquent\Builder;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class TanggalPemesananFilter extends DateRangeFilter
{
    protected function setUp(): void
    {
        $this->name('tanggal_pemesanan');

        $this->label('Periode Tanggal Pemesanan');

        $this->format('Y-m-d');

        $this->displayFormat('d M Y');

        parent::setUp();

        $this->modifyQueryUsing(function (Builder $query, $startDate, $endDate): Builder {
            if ($startDate === null && $endDate === null) {
                return $query;
            }

            return $query->whereHas('ticketingPemesanan', function (Builder $q) use ($startDate, $endDate): Builder {
                return $q
                    ->when($startDate, fn (Builder $qq) => $qq->whereDate('tanggal_pemesanan', '>=', $startDate))
                    ->when($endDate, fn (Builder $qq) => $qq->whereDate('tanggal_pemesanan', '<=', $endDate));
            });
        });

    }
    

    public static function getDefaultName(): ?string
    {
        return 'tanggal_pemesanan';
    }
}