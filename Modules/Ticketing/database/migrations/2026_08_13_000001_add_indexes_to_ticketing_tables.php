<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $indexes = [
        'ticketing_pemesanan' => [
            ['idx_pemesanan_kategori', ['tckt_kategori_pemesanan_id']],
            ['idx_pemesanan_unit_kerja', ['tckt_unit_kerja_id']],
            ['idx_pemesanan_tanggal', ['tanggal_pemesanan']],
            ['idx_pemesanan_status', ['status_pemesanan']],
        ],
        'ticketing_pembayaran' => [
            ['idx_pembayaran_pemesanan', ['tckt_pemesanan_id']],
            ['idx_pembayaran_unit_kerja', ['tckt_unit_kerja_id']],
        ],
        'ticketing_tiket_pesawat' => [
            ['idx_tiket_pesawat_pemesanan', ['tckt_pemesanan_id']],
            ['idx_tiket_pesawat_maskapai', ['tckt_maskapai_id']],
            ['idx_tiket_pesawat_vendor', ['tckt_vendor_id']],
            ['idx_tiket_pesawat_bandara_berangkat', ['tckt_bandara_berangkat_id']],
            ['idx_tiket_pesawat_bandara_tiba', ['tckt_bandara_tiba_id']],
        ],
        'ticketing_kamar_hotel' => [
            ['idx_kamar_hotel_pemesanan', ['tckt_pemesanan_id']],
            ['idx_kamar_hotel_hotel', ['tckt_hotel_id']],
            ['idx_kamar_hotel_vendor', ['tckt_vendor_id']],
            ['idx_kamar_hotel_jadwal_checkin', ['jadwal_checkin']],
        ],
        'ticketing_tiket_kereta' => [
            ['idx_tiket_kereta_pemesanan', ['tckt_pemesanan_id']],
            ['idx_tiket_kereta_vendor', ['tckt_vendor_id']],
            ['idx_tiket_kereta_kereta', ['tckt_kereta_id']],
            ['idx_tiket_kereta_stasiun_berangkat', ['tckt_stasiun_berangkat_id']],
            ['idx_tiket_kereta_stasiun_tiba', ['tckt_stasiun_tiba_id']],
        ],
        'ticketing_penumpang' => [
            ['idx_penumpang_nama', ['nama_penumpang']],
        ],
        'ticketing_penumpang_tiket_kereta' => [
            ['idx_ptk_penumpang', ['tckt_penumpang_id']],
            ['idx_ptk_tiket_kereta', ['tckt_tiket_kereta_id']],
        ],
        'ticketing_penumpang_tiket_pesawat' => [
            ['idx_ptp_tiket_pesawat', ['tckt_tiket_pesawat_id']],
        ],
        'ticketing_kamar_hotel_penumpang' => [
            ['idx_khp_kamar_hotel', ['tckt_kamar_hotel_id']],
        ],
        'ticketing_pembayaran_penumpang' => [
            ['idx_pp_pembayaran_penumpang', ['tckt_pembayaran_id', 'tckt_penumpang_id']],
            ['idx_pp_penumpang', ['tckt_penumpang_id']],
        ],
        'ticketing_dokumen' => [
            ['idx_dokumen_vendor', ['tckt_vendor_id']],
            ['idx_dokumen_pemesanan', ['tckt_pemesanan_id']],
        ],
        'ticketing_penumpang_dokumen' => [
            ['idx_pd_penumpang', ['tckt_penumpang_id']],
            ['idx_pd_dokumen', ['tckt_dokumen_id']],
        ],
    ];

    private function indexExists(string $table, string $index): bool
    {
        return DB::table('information_schema.statistics')
            ->where('table_schema', DB::getDatabaseName())
            ->where('table_name', $table)
            ->where('index_name', $index)
            ->exists();
    }

    public function up(): void
    {
        foreach ($this->indexes as $table => $indexes) {
            if (! Schema::hasTable($table)) {
                continue;
            }

            Schema::table($table, function (Blueprint $blueprint) use ($table, $indexes) {
                foreach ($indexes as [$indexName, $columns]) {
                    if ($this->indexExists($table, $indexName)) {
                        continue;
                    }

                    $blueprint->index($columns, $indexName);
                }
            });
        }
    }

    public function down(): void
    {
        foreach ($this->indexes as $table => $indexes) {
            if (! Schema::hasTable($table)) {
                continue;
            }

            Schema::table($table, function (Blueprint $blueprint) use ($indexes) {
                foreach ($indexes as [$indexName]) {
                    $blueprint->dropIndex($indexName);
                }
            });
        }
    }
};
