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
        $city = Category::create(['category_name' => 'Lego City']);
        $classic = Category::create(['category_name' => 'Lego Classic']);
        $batman = Category::create(['category_name' => 'Lego Batman']);
        $architecture = Category::create(['category_name' => 'Lego Architecture']);
    }
}
