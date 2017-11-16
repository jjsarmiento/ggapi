<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = "tokens";

    protected $fillable = [
    	'content',
    	'user_id',
    	'user_agent',
    	'expires_at'
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
