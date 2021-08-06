<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiteUser extends Model
{
    use HasFactory;
    protected $table = 'lite_users';

    public $timestamps = false;

    protected $fillable = [
        'salt',
        'img'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'lite_favorites',  'id_user', 'id_post');
    }

    public function vip()
    {
        return $this->hasOne(Vip::class, 'id_user');
    }

    public function role()
    {
        return $this->belongsTo(Status::class, 'status');
    }
}
