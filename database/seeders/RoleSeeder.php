<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'admin']);
        $role2 = Role::create(['name' => 'teacher']);
        $role3 = Role::create(['name' => 'student']);

        Permission::create(['name' => 'admin.home'])->assignRole($role1);
        Permission::create(['name' => 'createTeacher'])->assignRole($role1);
        Permission::create(['name' => 'createClassroom']);
        Permission::create(['name' => 'classroom.destroy']);


    }
}
