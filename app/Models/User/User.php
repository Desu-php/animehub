<?php

namespace App\Models\User;

use App\Models\Post\Favorite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['avatar'];

    public function getAvatarAttribute()
    {
        return asset($this->user->img);
    }

    public function user()
    {
        return $this->belongsTo(LiteUser::class, 'lite_user_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favorite()
    {
        return $this->morphOne(Favorite::class, 'favoriteable')->where('user_id', auth()->id());
    }

    public function vip()
    {
        return $this->hasOneThrough(Vip::class, LiteUser::class, 'id', 'id', 'lite_user_id', 'id_user');
    }
}
