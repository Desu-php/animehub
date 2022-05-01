<?php

namespace Database\Seeders;

use App\Models\Post\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
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
            ['name' => 'ТВ', 'slug' => 'tv'],
            ['name' => 'OVA', 'slug' => 'ova'],
            ['name' => 'Фильм', 'slug' => 'film'],
            ['name' => 'AMV', 'slug' => 'amv'],
        ];

        foreach ($data as $datum){
            Type::updateOrCreate([
                'name' => $datum['name']
            ],$datum);
        }

        Type::where('name', '')->delete();
    }
}
