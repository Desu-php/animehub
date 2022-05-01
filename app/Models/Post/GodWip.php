<?php


namespace App\Models\Post;


use Illuminate\Database\Eloquent\Model;

class GodWip extends Model
{
    protected $table = 'lite_god_wip';

    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class, 'id_god_wip');
    }

}
