<?php

namespace Database\Seeders;

use App\Models\ServiceCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceCategories::create([
            "name" => "Ini Categories",
            "slug" => "Slug",
        ]);
    }
}
