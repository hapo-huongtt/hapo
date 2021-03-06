<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    const ROLE = [
        0 => 'User',
        1 => 'Admin',
    ];

    const STATUS_PENDING = 0;
    const STATUS_CLOSE = 1;
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'image', 'name', 'email', 'password', 'age', 'gender', 'phone', 'address', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tasks()
    {
        return $this->hasMany('App\Models\task');
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
