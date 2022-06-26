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
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name' => 'Teacher']);
        $role3 = Role::create(['name' => 'Student']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.classrooms.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.classrooms.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.classrooms.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.classrooms.destroy'])->syncRoles([$role1]);


        Permission::create(['name' => 'teacher.classrooms.create'])->syncRoles([$role2]);
        Permission::create(['name' => 'showJoinRequests'])->syncRoles([$role2]);
        Permission::create(['name' => 'replyJoinRequests'])->syncRoles([$role2]);
        Permission::create(['name' => 'sendJoinRequests'])->syncRoles([$role3]);
        Permission::create(['name' => 'cancelJoinRequests'])->syncRoles([$role3]);
        Permission::create(['name' => 'classroom.publicate'])->syncRoles([$role2]);
        Permission::create(['name' => 'see.class'])->syncRoles([$role3]);
        Permission::create(['name' => 'class.show'])->syncRoles([$role3]);
        Permission::create(['name' => 'search.class'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'join.class'])->syncRoles([$role3]);
        Permission::create(['name' => 'leave.class'])->syncRoles([$role3]);
        Permission::create(['name' => 'teacher.classroom'])->syncRoles([$role2]);
        Permission::create(['name' => 'create.publication'])->syncRoles([$role2]);
        Permission::create(['name' => 'create.reply'])->syncRoles([$role2,$role3]);
        Permission::create(['name' => 'games'])->syncRoles([$role3]);
        Permission::create(['name' => 'concentrado'])->syncRoles([$role3]);
        Permission::create(['name' => 'initializeProgress'])->syncRoles([$role3]);
        Permission::create(['name' => 'updateProgress'])->syncRoles([$role2,$role3]);













    }
}
