<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
      /**
     * Define the model's default state.
     *
     *  @var string
     */
    protected $model = Classroom::class;
    /**
     *
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_clase' => $this->faker->sentences(),
            'tipo_clase' => $this->faker->randomElement(['Privada','Publica']),
            'vigente_hasta' => $this->faker->date('Y-m-d H:m:s')
        ];
    }
}
