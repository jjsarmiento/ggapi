<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_first',
        'name_mid',
        'name_last',
        'email',
        'username',
        'password',
        'birthdate',
        'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    protected $dates = ['deleted_at'];

    protected $touches = ['roles'];

    // Relationship with `roles` table; Pivot table `user_role` involved
    public function roles() {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id')
            ->select(['id', 'code', 'display'])
            ->as('user_role')
            ->withTimeStamps();        
    }

    // Relationship with `news` table
    public function news_authored() {
        return $this->hasMany('App\News', 'user_id', 'id');
    }
}
