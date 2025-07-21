<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SealNumber;
use App\Models\LetterNumber;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            SealNumber::create([
                'numero' => 'SN-00' . $i,
            ]);

            LetterNumber::create([
                'numero' => 'LN-00' . $i,
            ]);
        }
    }
}