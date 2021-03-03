<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id' => 1,
            'name' => 'Category #1',
            'image' => 'https://i.imgur.com/GIJjSA8.jpg'
        ]);

        Category::create([
            'id' => 2,
            'name' => 'Sub-Category #1',
            'image' => 'https://i.imgur.com/GIJjSA8.jpg',
            'parent' => 1
        ]);

        Category::create([
            'id' => 3,
            'name' => 'Sub-Category #2',
            'image' => 'https://i.imgur.com/GIJjSA8.jpg',
            'parent' => 1
        ]);

    }
}
