<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $types;
    public function run()
    {
        //
        $posts = Post::with('tv')->get();
        $this->types = Type::all();
        foreach ($posts as $post){
            if (Str::contains(Str::lower($post->tv->title), ['tv', 'тв'])){
               $this->save($post, 'tv');
            }elseif (Str::contains(Str::lower($post->tv->title), ['фильм', 'film'])){
                $this->save($post, 'film');
            }elseif (Str::contains(Str::lower($post->tv->title), ['ova', 'ова'])){
                $this->save($post, 'ova');
            }elseif (Str::contains(Str::lower($post->tv->title), 'amv')){
                $this->save($post, 'amv');
            }
        }

    }

    private function save($post, $slug)
    {
        $post->id_type = $this->types->where('slug', $slug)->first()->id;
        $post->save();
    }
}
