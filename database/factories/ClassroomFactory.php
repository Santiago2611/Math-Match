<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = new Image();
        return [
            'nombre_clase' => $this->faker->name(),
            'descripcion_clase' => $this->faker->text(89),
            'tipo_clase' => $this->faker->randomElement(['Privada','Publica']),
            'vigente_hasta' => $this->faker->date(),
            'grado' => $this->faker->randomElement([8,9,10,11]),
            'url_images' => $image->url
        ];
    }
}
