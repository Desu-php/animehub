<?php


namespace App\Models\Post;


use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $table = 'lite_anime';
    public $timestamps = false;

    protected $fillable = [
        'id_stud',
        'id_kach',
        'id_tv',
        'id_title',
        'src',
        'seria',
        'mix_title',
        'img',
        'rly_path',
        'date',
        'auto_correction',
        'post_id',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->kach->title.' '.$this->stud->title.' '.$this->seria.' серия';
    }

    public function title()
    {
        return $this->belongsTo(Title::class, 'id_title');
    }

    public function stud()
    {
        return $this->belongsTo(Stud::class, 'id_stud');
    }

    public function kach()
    {
        return $this->belongsTo(Kach::class, 'id_kach');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
