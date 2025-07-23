<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SealNumber;
use App\Models\LetterNumber;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        $userCi = 12345678; // CI del admin creado en UserSeeder

        for ($i = 1; $i <= 5; $i++) {
            SealNumber::create([
                'numero_sello' => 'SN-00' . $i,
                'user_ci' => $userCi,
            ]);

            LetterNumber::create([
                'numero_carta' => 'LN-00' . $i,
                'user_ci' => $userCi,
            ]);
        }
    }
}