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
        $guestRole = Role::create(["name" => "Guest"]);

        // create demo admin user
        $adminUser = \App\Models\User::factory()->create([
            "name" => "Admin",
            "email" => "admin@molvenoresort.com",
            "password" => bcrypt("password"),
            "email_verified_at" => now(),
        ]);
        $adminUser->assignRole($adminRole);

        // create demo guest user
        $guestUser = \App\Models\User::factory()->create([
            "name" => "TestUser",
            "email" => "testuser@molvenoresort.com",
            "password" => bcrypt("password"),
            "email_verified_at" => now(),
        ]);
        $guestUser->assignRole($guestRole);
    }
}
