<?php

namespace App\Models\User;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiteUser extends Model
{
    use HasFactory;
    protected $table = 'lite_users';

    public $timestamps = false;

    protected $fillable = [
        'salt',
        'img',
        'ip'
    ];

    public function getAvatarAttribute()
    {
        return $this->img ? asset($this->img) : asset('images/default_avatar.png');
    }

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
