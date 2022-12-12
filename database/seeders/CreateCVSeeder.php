<?php

namespace Database\Seeders;

use App\Models\CV;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateCVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CV::create([
            'filename' => 'naufalfaqiihashshiddiq.pdf'
        ]);
    }
}
