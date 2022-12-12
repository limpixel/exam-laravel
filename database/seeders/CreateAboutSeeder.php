<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title' => 'About',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, quidem. Optio quisquam illum laudantium dolore harum iste repellendus, voluptatem sapiente quas totam doloribus suscipit vitae perferendis omnis nihil accusantium veniam nesciunt deleniti id labore expedita accusamus quae aliquam. Eaque nostrum delectus perferendis nulla, soluta eligendi iure fugit eum nemo adipisci?',
        ]);
    }
}
