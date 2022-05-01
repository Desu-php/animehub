<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'lite_type';

    protected $fillable = [
        'name',
        'slug'
    ];

    public $timestamps = false;
}
