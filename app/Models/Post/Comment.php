<?php

namespace App\Models\Post;

use App\Models\User\LiteUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'lite_comment';

    protected $fillable = [
        'id_post',
        'id_news',
        'id_user',
        'body',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(LiteUser::class, 'id_user');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }

}
