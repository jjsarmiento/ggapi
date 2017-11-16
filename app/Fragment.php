<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fragment extends Model
{
    use SoftDeletes;

	protected $table = "fragments";

    protected $fillable = [
    	'name',
    	'content',
    	'description',
    	'img',
    	'finished',
    	'frag_type',
    	'orb_id'
    ];

    protected $dates = ['deleted_at'];
}
