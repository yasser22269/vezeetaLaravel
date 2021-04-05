<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

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
            'slug'  => 'gldya',
            'name'  => 'جلدية',
            'is_active'  => 1,

        ]);

        Category::create([
            'slug'  => 'btna',
            'name'  => 'باطنة',
            'is_active'  => 1,

        ]);
        Category::create([
            'slug'  => 'twled nesa',
            'name'  => 'نساء وتوليد',
            'is_active'  => 1,

        ]);
        Category::create([
            'slug'  => 'nfsya',
            'name'  => 'نفسية',
            'is_active'  => 1,

        ]);
        Category::create([
            'slug'  => 'azam',
            'name'  => 'عظام',
            'is_active'  => 1,

        ]);
        Category::create([
            'slug'  => 'asnan',
            'name'  => 'اسنان',
            'is_active'  => 1,

        ]);
    }
}
