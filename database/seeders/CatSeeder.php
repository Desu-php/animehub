<?php

namespace Database\Seeders;

use App\Models\Post\Cat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cats = Cat::whereNull('slug')->get();
        foreach ($cats as $cat){
            $cat->slug = Str::slug($cat->title);
            $cat->save();
        }
    }
}
