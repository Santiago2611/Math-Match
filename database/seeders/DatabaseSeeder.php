<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ClassroomFactory;
use Database\Factories\ImageFactory;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::makeDirectory('public/classrooms');
        $this->call(ImageSeeder::class);

        $this->call(RoleSeeder::class);
    }
}
