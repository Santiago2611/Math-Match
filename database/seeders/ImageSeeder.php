<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = Image::factory(50)->create();
        foreach ($image as $classroom) {
            Classroom::factory(1)->create([
            'url_images' => $classroom->url
            ]);
        }
    }
}
