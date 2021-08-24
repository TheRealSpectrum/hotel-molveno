<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Room;
use App\Models\Roomtype;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "room_number" => $this->faker->numberBetween(-10000, 10000),
            "is_clean" => $this->faker->boolean,
            "max_guests" => $this->faker->numberBetween(-10000, 10000),
            "roomtype_id" => Roomtype::factory(),
        ];
    }
}
