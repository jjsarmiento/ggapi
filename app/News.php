<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class News extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = "news";

    protected $fillable = [
    	'title',
    	'content',
    	'img'
    ];

    protected $dates = ['deleted_at'];
}
