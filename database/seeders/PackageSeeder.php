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
        Package::create(["name" => "Annuleringspakket", "price" => 25]);
        Package::create(["name" => "Pakket2", "price" => 50]);
        Package::create(["name" => "Pakket3", "price" => 75]);
    }
}
