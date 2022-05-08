<?php


namespace App\Models\Post;


use Illuminate\Database\Eloquent\Model;

class Stud extends Model
{
    protected $table = 'lite_stud';

    public $timestamps = false;

    public function series()
    {
        return $this->hasMany(Anime::class, 'id_stud');
    }

    public function posts()
    {
        return $this->hasManyThrough(Post::class, Anime::class, 'id_stud', 'id', 'id', 'post_id');
    }

    public function scopePost($q, $post_id)
    {
        return $q->whereHas('posts', fn($q) => $q->where('lite_post.id', $post_id));
    }
}
