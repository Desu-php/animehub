<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $table = 'lite_god_wip';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'id'
    ];
}
