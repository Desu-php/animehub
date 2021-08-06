<?php

namespace Database\Seeders;

use App\Models\TypePost;
use Illuminate\Database\Seeder;

class TypePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'id' => 1,
                'name' => 'Аниме',
                'alias' => 'anime'
            ],
            [
                'id' => 2,
                'name' => 'Дорама',
                'alias' => 'dorams'
            ],
            [
                'id' => 3,
                'name' => 'Статьи',
                'alias' => 'articles'
            ],
        ];
        foreach ($data as $datum){
            TypePost::updateOrCreate([
               'id' => $datum['id']
            ],$datum);
        }
    }
}
