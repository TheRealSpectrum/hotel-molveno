<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create(["name" => "Cancellation insurance", "price" => 25]);
        Package::create(["name" => "Baby cot", "price" => 0, "is_task" => 1]);
        Package::create(["name" => "Champagne", "price" => 75, "is_task" => 1]);
    }
}
