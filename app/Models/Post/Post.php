<?php

namespace App\Models\Post;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $table = 'lite_post';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public $timestamps = false;

    protected $perPage = 28;

    protected $fillable = [
        'id_god_wip',
        'image',
        'title',
        'alias',
        'slug',
        'date',
        'views',
        'body',
        'rating',
        'prichina',
        'id_user',
        'id_user_update',
        'id_type',
        'id_type_post',
    ];

    public function getFullTitleAttribute()
    {
        return $this->title . ' ' . $this->tv->title;
    }

    public function tops()
    {
        return $this->hasMany(Top::class, 'id_post');
    }

    public function tv()
    {
        return $this->belongsTo(Tv::class, 'id_tv');
    }

    public function categories()
    {
        return $this->belongsToMany(Cat::class, 'lite_cat_post', 'id_post', 'id_cat');
    }

    public function year()
    {
        return $this->belongsTo(GodWip::class, 'id_god_wip');
    }

    public function view()
    {
        return $this->hasOne(View::class, 'id_post');
    }

    public function type()
    {
        return $this->belongsTo(TypePost::class, 'id_type_post', 'id');
    }

    public function scopePost($query, $type)
    {
        return $query->whereHas('type', function (Builder $builder) use ($type) {
            $builder->where('alias', $type);
        })->base();
    }

    public function scopeYear($query, $year)
    {
        return $query->whereHas('year', function ($query) use ($year) {
            $query->where('title', $year);
        });
    }

    public function scopeCategory($query, $category)
    {
        return $query->whereHas('categories', function (Builder $builder) use ($category) {
            $builder->where('slug', $category);
        });
    }

    public function scopeCategories($query, $categories, $key = 'id')
    {
        return $query->whereHas('categories', function ($q) use ($categories, $key){
            foreach ($categories->take(2) as $category){
                $q->where('lite_cat.id', $category->$key);
            }

        });
    }

    public function anime()
    {
        return $this->hasOne(Anime::class, 'post_id');
    }

    public function series()
    {
        return $this->hasMany(Anime::class, 'post_id');
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'favoriteable', 'favorites');
    }

    public function typeAnime()
    {
        return $this->belongsTo(Type::class, 'id_type');
    }

    public function scopeBase($query)
    {
        return $query->with(['categories', 'view', 'tv'])
            ->with(['anime' => function ($query) {
                $query->orderByDesc('seria');
            }]);
    }

    public function scopeTypeAnime($query, $slug)
    {
        return $query->whereHas('typeAnime', function (Builder $builder) use ($slug) {
            $builder->where('slug', $slug);
        });
    }

    public function comments()
    {
       return $this->hasMany(Comment::class, 'id_post');
    }
}

