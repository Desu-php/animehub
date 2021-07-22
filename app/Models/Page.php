<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'lite_pages';
    public $timestamps = false;
    protected $primaryKey = 'id_page';

    protected $fillable = [
        'id_page',
        'title',
        'alias',
        'order_menu'
    ];
}
