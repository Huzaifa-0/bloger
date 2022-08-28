<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'publish']);
        Permission::create(['name' => 'manage']);

      $admin=  Role::create(['name' => 'admin']);
      $admin->givePermissionTo('manage');

      $user=  Role::create(['name' => 'user']);
      $user->givePermissionTo('publish');

      $editor=  Role::create(['name' => 'editor']);
      $editor->syncPermissions(['edit','delete','publish']);

    }
}
