<?php

namespace Database\Seeders;

use Backpack\PageManager\app\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            "template" => "homepage",
            "name" => "homepage",
            "title" => "Homepage",
            "slug" => "home",
            "content" => null,
            "extras" => null,
        ]);
    }
}
