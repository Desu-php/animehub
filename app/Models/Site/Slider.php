<?php

namespace App\Models\Site;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'lite_slider';

    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_pos');
    }
}
