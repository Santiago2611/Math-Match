<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ClassroomFactory;
use Database\Factories\ImageFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClassroomSeeder::class);
    }
}
