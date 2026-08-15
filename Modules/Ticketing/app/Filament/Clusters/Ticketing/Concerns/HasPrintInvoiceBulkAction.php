<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Concerns;

use Filament\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

trait HasPrintInvoiceBulkAction
{
    protected function printInvoiceBulkAction(string $routeName, ?string $idColumn = null): BulkAction
    {
        return BulkAction::make('print_invoice')
            ->label('Print Invoice')
            ->icon('heroicon-o-printer')
            ->color('info')
            ->action(function (BulkAction $action, EloquentCollection $records) use ($routeName, $idColumn): void {
                $idPenumpang = $records->pluck($idColumn ?? 'id')->join(',');

                $owner = $this->getOwnerRecord();
                $idPemesanan = $owner?->ticketingPemesanan?->getKey() ?? $owner?->getKey();

                $this->js(sprintf(
                    "window.open('%s', '_blank')",
                    route($routeName, [
                        'id_pemesanan' => $idPemesanan,
                        'id_penumpang' => $idPenumpang,
                    ])
                ));
            });
    }
}
