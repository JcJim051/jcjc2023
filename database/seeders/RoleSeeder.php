<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'superuser']);
        $role2 = Role::create(['name' => 'teller']);
        $role3 = Role::create(['name' => 'coordinator']);
        $role4 = Role::create(['name' => 'consultor']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.superusers.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.superusers.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.superusers.update'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.superusers.destroy'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.tellers.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.tellers.update'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.coordinators.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.coordinators.update'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.consultors.index'])->syncRoles([$role1, $role2, $role3, $role4]);
    }
}
