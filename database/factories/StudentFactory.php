<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
class StudentFactory extends Factory
{
    /**
     * The name of factory corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_estu'  => $this->faker->sentence(),
            'apellidos_estu'=> $this->faker->sentence(),
            'email_estu'=> $this->faker->sentence(),
            'password_estu'=> $this->faker->sentence(),
            'sexo_estu'=> $this->faker->randomElements('Masculino','Femenino'),
            'grado'=> $this->faker->randomElement(8,9,10,11),
            'fecha_naci'=> $this->faker->randomElements('2004-12-12','2003-02-02')
        ];
    }
}
