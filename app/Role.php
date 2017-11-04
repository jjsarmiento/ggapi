<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = "roles";

    protected $fillable = [
    	'code',
    	'display'
    ];

    protected $dates = ['deleted_at'];
}
