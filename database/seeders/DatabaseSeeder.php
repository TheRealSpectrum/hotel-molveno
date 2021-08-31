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
        $this->call(AdminUserSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(RoomtypeSeeder::class);
        $this->call(GuestSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}
