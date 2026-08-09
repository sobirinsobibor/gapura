<?php

namespace Modules\Ticketing\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Ticketing\Models\TicketingKategoriPemesanan;

class TicketingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['Ticket', 'Tour'] as $kategori) {
            TicketingKategoriPemesanan::firstOrCreate(
                ['nama_kategori' => $kategori]
            );
        }
    }
}
