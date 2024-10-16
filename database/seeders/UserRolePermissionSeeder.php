<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '1234',
            'remember_token' => Str::random(10),
        ];

        $admin = User::create([
            'name' => 'Anjua Partama Rusvandia',
            'email' => 'anjua@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Nju@120687'),
            'remember_token' => Str::random(10),
        ]);

        $staff = User::create(array_merge([
            'email' => 'staff@email.com',
            'name' => 'staff',
        ], $default_user_value));

        $spv = User::create(array_merge([
            'email' => 'spv@email.com',
            'name' => 'spv',
        ], $default_user_value));

        $manager = User::create(array_merge([
            'email' => 'manager@email.com',
            'name' => 'manager',
        ], $default_user_value));

        $it = User::create(array_merge([
            'email' => 'it@email.com',
            'name' => 'it',
        ], $default_user_value));

        $staffRole = Role::create(['name' => 'staff']);
        $spvRole = Role::create(['name' => 'spv']);
        $managerRole = Role::create(['name' => 'manager']);
        $itRole = Role::create(['name' => 'it']);

        $permission = Permission::create(['name' => 'create role']);
        $permission = Permission::create(['name' => 'read role']);
        $permission = Permission::create(['name' => 'update role']);
        $permission = Permission::create(['name' => 'delete role']);

        $itRole->givePermissionTo('create role');
        $itRole->givePermissionTo('read role');
        $itRole->givePermissionTo('update role');
        $itRole->givePermissionTo('delete role');

        $staff->assignRole('staff');
        $spv->assignRole('spv');
        $manager->assignRole('manager');
        $it->assignRole('it');
    }
}
