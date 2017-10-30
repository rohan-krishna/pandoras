<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset Cache
        app()['cache']->forget('spatie.permission.cache');

        // Create Permissions by Group
        // Users
        $createUser = Permission::create(['name' => 'create users', 'group' => 'users']);
        $readUser = Permission::create(['name' => 'read users', 'group' => 'users']);
        $updateUser = Permission::create(['name' => 'update users', 'group' => 'users']);
        $deleteUser = Permission::create(['name' => 'delete users', 'group' => 'users']);
        $extendUser = Permission::create(['name' => 'extend users', 'group' => 'users']);

        // Roles
        $createRole = Permission::create(['name' => 'create roles', 'group' => 'roles']);
        $readRole = Permission::create(['name' => 'read roles', 'group' => 'roles']);
        $updateRole = Permission::create(['name' => 'update roles', 'group' => 'roles']);
        $deleteRole = Permission::create(['name' => 'delete roles', 'group' => 'roles']);

        // Roles
        $super = Role::create(['name' => 'Super Administrator']);
        $admin = Role::create(['name' => 'Administrator']);
        $executives = Role::create(['name' => 'Executive']);
        $agents = Role::create(['name' => 'Agent']);

        $super->syncPermissions(Permission::all());
        $admin->syncPermissions(Permission::all());
        // $executives->syncPermissions(Permission::where('group','reports')->get());

        // Engineer Permissions
        // $agents->syncPermissions(Permission::where('group','cases')->get());


        $user = pan\User::first();
        $user->assignRole($super);
    }
}
