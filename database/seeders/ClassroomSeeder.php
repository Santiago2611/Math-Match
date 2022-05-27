<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classrooms = Classroom::factory(50)->create();
        foreach ($classrooms as $classroom) {
            Image::factory(1)->create([
                'imageable_id' => $classroom->id,
                'nombre_c' => $classroom->nombre_clase,
                'imageable_type' => Classroom::class
            ]);
        }
    }
}
