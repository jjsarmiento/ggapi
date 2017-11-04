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

    public function roles() {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id')
            ->as('user_role')
            ->withTimeStamps();        
    }
}
