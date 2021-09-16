<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $adminRole = Role::create(["name" => "Admin"]);
        Role::create(["name" => "Guest"]);

        // create demo users
        $user = \App\Models\User::factory()->create([
            "name" => "Admin",
            "email" => "admin@molvenoresort.com",
            "password" => bcrypt("password"),
            "email_verified_at" => now(),
        ]);
        $user->assignRole($adminRole);
    }
}
