<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Room;

class ReservationFactory extends Factory
{
    /* The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /* Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "guest_id" => Guest::factory(),
            "room_id" => Room::factory(),
            "check_in" => $this->faker->date(),
            "check_out" => $this->faker->date(),
        ];
    }
}
