<?php

namespace Database\Seeders;

use App\Models\Log;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tanggalAwal = new DateTime("2023-09-04");
        $tanggalAkhir = new DateTime("2023-09-08");
        $next = clone $tanggalAwal;
        while($next <= $tanggalAkhir){
            Log::create([
                'user_id' => 5,
                'body' => 'lorem ipsum dolor amet.',
                'date' => $next
            ]);
            $next->modify('+1 day');
        }
    }
}
