<?php

namespace Modules\Ticketing\Filament\Clusters\Ticketing\Concerns;

use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Writer\XLSX\Writer;
use Symfony\Component\HttpFoundation\StreamedResponse;

trait ListsReservasiByEntity
{
    protected function getReservasiAnchorModel(): string
    {
        throw new \BadMethodCallException('getReservasiAnchorModel() must be implemented in the page.');
    }

    protected function getReservasiEagerLoads(): array
    {
        return [
            'ticketingPemesanan.ticketingKategoriPemesanan',
            'ticketingPemesanan.ticketingUnitKerja',
            'ticketingPemesanan.ticketingPembayaran',
            'ticketingVendor',
        ];
    }

    protected function getTableQuery(): Builder
    {
        $model = $this->getReservasiAnchorModel();

        return $model::query()->with($this->getReservasiEagerLoads());
    }

    protected function reservasiBaseExportColumns(): array
    {
        return [
            'ticketingPemesanan.invoice' => 'Invoice',
            'ticketingPemesanan.nama_customer' => 'Pemesan',
            'ticketingPemesanan.ticketingKategoriPemesanan.nama_kategori' => 'Kategori',
            'ticketingPemesanan.ticketingUnitKerja.nama_unit_kerja' => 'Unit Kerja',
            'ticketingPemesanan.tanggal_pemesanan' => 'Tanggal Pemesanan',
            'ticketingPemesanan.ticketingPembayaran.nama_pembayar' => 'Nama Pembayar',
            'ticketingPemesanan.status_pemesanan' => 'Status',
            'ticketingPemesanan.pulang_pergi' => 'Pulang Pergi',
            'ticketingPemesanan.harga_beli' => 'Harga Beli',
            'ticketingPemesanan.harga_publish' => 'Harga Publish',
            'ticketingPemesanan.harga_jual' => 'Harga Jual',
            'ticketingVendor.nama_vendor' => 'Vendor',
        ];
    }

    protected function exportReservasiAction(): Action
    {
        return Action::make('export_reservasi')
            ->label('Export Excel')
            ->icon('heroicon-o-arrow-down-tray')
            ->color('success')
            ->action(fn (): StreamedResponse => $this->streamExportReservasi());
    }

    protected function streamExportReservasi(): StreamedResponse
    {
        $columns = $this->getReservasiExportColumns();
        $query = $this->getTableQueryForExport();

        return response()->streamDownload(function () use ($columns, $query): void {
            $writer = app(Writer::class);
            $writer->openToBrowser('reservasi_export.xlsx');

            $writer->addRow(Row::fromValues(array_values($columns)));

            foreach ($query->get() as $record) {
                $row = [];

                foreach (array_keys($columns) as $column) {
                    $value = data_get($record, $column);

                    if (str_ends_with($column, 'include_breakfast')) {
                        $value = $value ? 'Ya' : 'Tidak';
                    }

                    if (str_ends_with($column, 'pulang_pergi')) {
                        $value = $value ? 'Ya' : 'Tidak';
                    }

                    if (is_null($value)) {
                        $value = '';
                    }

                    $row[] = $value;
                }

                $writer->addRow(Row::fromValues($row));
            }

            $writer->close();
        }, 'reservasi_export.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}