<?php

namespace Database\Seeders;

use App\Models\Roomtype;
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
        $roomTypes = [
            [
                "name" => "Basic",
                "price" => 80,
                "room_surface" => 30,
            ],
            [
                "name" => "Luxury",
                "price" => 160,
                "room_surface" => 60,
            ],
        ];

        foreach ($roomTypes as $roomType) {
            Roomtype::create($roomType);
        }
    }
}
