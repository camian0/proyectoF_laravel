<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rol;
use App\Models\User;
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

        Rol::factory(2)->create();
        User::factory(3)->create();
        Category::factory(5)->create();
        Product::factory(5)->create();

    }
}
