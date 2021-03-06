<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mateo',
            'last' =>'Zapata',
            'email' =>'mzapata812@misena.edu.co',
            'group' => null,
            'birth' => '13-04-2004',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Santiago',
            'last' =>'Villalba',
            'email' =>'svillalba31@misena.edu.co',
            'group' => null,
            'birth' => '26-11-2004',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');
    }
}
