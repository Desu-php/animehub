<?php


namespace App\Models\Post;


use Illuminate\Database\Eloquent\Model;

class Kach extends Model
{
    public $timestamps = false;
    protected $table = 'lite_kach';

    public function series()
    {
        return $this->hasMany(Anime::class, 'id_kach');
    }

    public function posts()
    {
       return $this->hasManyThrough(Post::class, Anime::class, 'id_kach', 'id', 'id', 'post_id');
    }

    public function scopePost($q, $post_id)
    {
        return $q->whereHas('posts', fn($q) => $q->where('lite_post.id', $post_id));
    }
}
