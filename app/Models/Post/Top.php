<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_post',
        'rating'
    ];

    protected $primaryKey = 'id_top';

    public $timestamps = false;

    protected $table = 'lite_top';

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
}
