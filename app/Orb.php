<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orb extends Model
{
    use SoftDeletes;

    protected $table = "orbs";

    protected $fillable = [
    	'title',
    	'description',
    	'consecutive',
    	'img',
    	'tag',
    	'access',
    	'owner_id'
    ];

    protected $dates = ['deleted_at'];
}
