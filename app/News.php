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
    	'img',
    	'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function author() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
