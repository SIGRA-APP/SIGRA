<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GerejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gereja')->insert([
            [
                'nama_gereja' => 'GKII Sangkar NiHuta',
                'kutipan' => 'Kami dengan senang hati menyambut Anda di GKII Sangkar NiHuta. Kami berkomitmen untuk melayani dengan penuh kasih dan dedikasi, serta menghadirkan pengalaman ibadah yang bermakna bagi setiap jemaat.',
                'online' => '10.00 - 12.00 WIB',
                'sesi' => '08.00 - 10.00 WIB',
                'kontak' => '+62878184143'
            ],
        ]);
    }
}
