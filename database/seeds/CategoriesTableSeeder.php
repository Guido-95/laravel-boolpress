<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "backend",
            "frontend",
            "UX",
            "UI",
            "Network"
        ];

        foreach ($categories as $item) {
            $category =  new Category();
            $category->name = $item;
            $category->slug = Str::slug($category->name,'-');
            $category->save();
        }
    }
}
