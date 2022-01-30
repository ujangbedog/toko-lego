<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = Category::create(['name' => 'Lego City']);
        $classic = Category::create(['name' => 'Lego Classic']);
        $batman = Category::create(['name' => 'Lego Batman']);
        $architecture = Category::create(['name' => 'Lego Architecture']);
    }
}
