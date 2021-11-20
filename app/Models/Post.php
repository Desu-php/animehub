<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Post extends Model {

    protected $table = 'lite_post';
    public $timestamps = false;

    protected $perPage = 28;

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

    public function scopePost($query,$type)
    {
        return $query->whereHas('type', function (Builder $builder)use ($type){
            $builder->where('alias', $type);
        })->with(['categories', 'view', 'tv'])
            ->with(['anime' => function($query){
                $query->orderByDesc('seria');
            }]);
    }

   public function scopeYear($query, $year)
    {
        return $query->whereHas('year', function($query) use($year){
            $query->where('title',$year );
        });
    }

    public function scopeCategory($query,$category)
    {
        return $query->whereHas('categories', function (Builder  $builder) use ($category){
            $builder->where('slug', $category);
        });
    }


    public function anime()
    {
        return $this->hasOne(Anime::class, 'post_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'lite_favorites', 'id_post', 'id_user');
    }
}

