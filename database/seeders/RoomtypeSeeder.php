<?php

namespace Database\Seeders;

use App\Roomtype;
use Illuminate\Database\Seeder;

class RoomtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roomtype::factory()
            ->count(5)
            ->create();
    }
}
