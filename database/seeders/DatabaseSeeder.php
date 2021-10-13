<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoomtypeSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(GuestSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(PageSeeder::class);
    }
}
