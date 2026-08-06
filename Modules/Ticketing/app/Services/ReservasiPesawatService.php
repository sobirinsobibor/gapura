<?php

namespace Modules\Ticketing\Services;

use Illuminate\Support\Facades\DB;
use Modules\Ticketing\Models\TicketingPemesanan;
use Modules\Ticketing\Models\TicketingPembayaran;
use Modules\Ticketing\Models\TicketingTiketPesawat;

class ReservasiPesawatService extends ReservasiService
{
    public function create(array $data): TicketingPemesanan
    {
        return DB::transaction(function () use ($data) {
            $segmenPulang = $this->segmenPulang($data['detail_pulang_pergi'] ?? []);

            $pemesanan = TicketingPemesanan::create([
                'invoice' => $this->generateInvoiceNumber('1'),
                'nama_customer' => $data['nama_customer'] ?? null,
                'tckt_kategori_pemesanan_id' => $data['kategori_pemesanan_id'] ?? null,
                'tckt_unit_kerja_id' => $data['unit_kerja_pemesan'] ?? null,
                'status_pemesanan' => $data['status_pemesanan'] ?? null,
                'pulang_pergi' => count($segmenPulang) > 0 ? 1 : 0,
                'tanggal_pemesanan' => $this->toDate($data['tanggal_pemesanan'] ?? null),
                'harga_beli' => $this->toInteger($data['harga_beli'] ?? null),
                'harga_publish' => $this->toInteger($data['harga_publish'] ?? null),
                'harga_jual' => $this->toInteger($data['harga_jual'] ?? null),
            ]);

            TicketingPembayaran::create([
                'tckt_unit_kerja_id' => $data['unit_kerja_pembayar'] ?? null,
                'tckt_pemesanan_id' => $pemesanan->id,
                'nama_pembayar' => $data['nama_pembayar'] ?? null,
            ]);

            TicketingTiketPesawat::create([
                'tckt_pemesanan_id' => $pemesanan->id,
                'tckt_maskapai_id' => $data['maskapai_id'] ?? null,
                'tckt_vendor_id' => $data['vendor_id'] ?? null,
                'tckt_bandara_berangkat_id' => $data['bandara_berangkat_id'] ?? null,
                'tckt_bandara_tiba_id' => $data['bandara_tiba_id'] ?? null,
                'nomor_ticket' => $data['nomor_ticket'] ?? null,
                'nomor_penerbangan' => $data['nomor_penerbangan'] ?? null,
                'kode_booking_pesawat' => $data['kode_booking_pesawat'] ?? null,
                'kelas' => $data['kelas'] ?? null,
                'jadwal_berangkat_pesawat' => $this->normalizeDateTime($data['jadwal_berangkat_pesawat'] ?? null),
                'jadwal_tiba_pesawat' => $this->normalizeDateTime($data['jadwal_tiba_pesawat'] ?? null),
                'zona_waktu' => $data['zona_waktu'] ?? null,
                'detail_pulang_pergi' => count($segmenPulang) > 0 ? json_encode($segmenPulang) : null,
            ]);

            return $pemesanan;
        });
    }

    public function update(TicketingPemesanan $pemesanan, array $data): TicketingPemesanan
    {
        return DB::transaction(function () use ($pemesanan, $data) {
            $segmenPulang = $this->segmenPulang($data['detail_pulang_pergi'] ?? []);

            $pemesanan->update([
                'nama_customer' => $data['nama_customer'] ?? $pemesanan->nama_customer,
                'tckt_kategori_pemesanan_id' => $data['kategori_pemesanan_id'] ?? $pemesanan->tckt_kategori_pemesanan_id,
                'tckt_unit_kerja_id' => $data['unit_kerja_pemesan'] ?? $pemesanan->tckt_unit_kerja_id,
                'status_pemesanan' => $data['status_pemesanan'] ?? $pemesanan->status_pemesanan,
                'pulang_pergi' => count($segmenPulang) > 0 ? 1 : 0,
                'tanggal_pemesanan' => $this->toDate($data['tanggal_pemesanan'] ?? $pemesanan->tanggal_pemesanan),
                'harga_beli' => $this->toInteger($data['harga_beli'] ?? $pemesanan->harga_beli),
                'harga_publish' => $this->toInteger($data['harga_publish'] ?? $pemesanan->harga_publish),
                'harga_jual' => $this->toInteger($data['harga_jual'] ?? $pemesanan->harga_jual),
            ]);

            $pembayaran = $pemesanan->ticketingPembayaran;
            $dataPembayaran = [
                'tckt_unit_kerja_id' => $data['unit_kerja_pembayar'] ?? $pembayaran?->tckt_unit_kerja_id,
                'nama_pembayar' => $data['nama_pembayar'] ?? $pembayaran?->nama_pembayar,
            ];
            if ($pembayaran) {
                $pembayaran->update($dataPembayaran);
            } else {
                $dataPembayaran['tckt_pemesanan_id'] = $pemesanan->id;
                TicketingPembayaran::create($dataPembayaran);
            }

            $tiket = $pemesanan->ticketingTiketPesawat;
            $dataTiket = [
                'tckt_maskapai_id' => $data['maskapai_id'] ?? $tiket?->tckt_maskapai_id,
                'tckt_vendor_id' => $data['vendor_id'] ?? $tiket?->tckt_vendor_id,
                'tckt_bandara_berangkat_id' => $data['bandara_berangkat_id'] ?? $tiket?->tckt_bandara_berangkat_id,
                'tckt_bandara_tiba_id' => $data['bandara_tiba_id'] ?? $tiket?->tckt_bandara_tiba_id,
                'nomor_ticket' => $data['nomor_ticket'] ?? $tiket?->nomor_ticket,
                'nomor_penerbangan' => $data['nomor_penerbangan'] ?? $tiket?->nomor_penerbangan,
                'kode_booking_pesawat' => $data['kode_booking_pesawat'] ?? $tiket?->kode_booking_pesawat,
                'kelas' => $data['kelas'] ?? $tiket?->kelas,
                'jadwal_berangkat_pesawat' => $this->normalizeDateTime($data['jadwal_berangkat_pesawat'] ?? null)
                    ?? $tiket?->jadwal_berangkat_pesawat,
                'jadwal_tiba_pesawat' => $this->normalizeDateTime($data['jadwal_tiba_pesawat'] ?? null)
                    ?? $tiket?->jadwal_tiba_pesawat,
                'zona_waktu' => $data['zona_waktu'] ?? $tiket?->zona_waktu,
                'detail_pulang_pergi' => count($segmenPulang) > 0 ? json_encode($segmenPulang) : null,
            ];
            if ($tiket) {
                $tiket->update($dataTiket);
            } else {
                $dataTiket['tckt_pemesanan_id'] = $pemesanan->id;
                TicketingTiketPesawat::create($dataTiket);
            }

            return $pemesanan;
        });
    }

    private function segmenPulang(mixed $rows): array
    {
        if (!is_array($rows)) {
            return [];
        }

        return collect($rows)
            ->filter()
            ->values()
            ->map(fn (array $row) => [
                'status_pemesanan' => $row['status_pemesanan'] ?? null,
                'maskapai_id' => $row['maskapai_id'] ?? null,
                'vendor_id' => $row['vendor_id'] ?? null,
                'bandara_berangkat_id' => $row['bandara_berangkat_id'] ?? null,
                'bandara_tiba_id' => $row['bandara_tiba_id'] ?? null,
                'nomor_ticket' => $row['nomor_ticket'] ?? null,
                'nomor_penerbangan' => $row['nomor_penerbangan'] ?? null,
                'kode_booking_pesawat' => $row['kode_booking_pesawat'] ?? null,
                'kelas' => $row['kelas'] ?? null,
                'jadwal_berangkat_pesawat' => $this->normalizeDateTime($row['jadwal_berangkat_pesawat'] ?? null),
                'jadwal_tiba_pesawat' => $this->normalizeDateTime($row['jadwal_tiba_pesawat'] ?? null),
                'zona_waktu' => $row['zona_waktu'] ?? null,
            ])
            ->all();
    }
}