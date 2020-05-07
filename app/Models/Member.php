<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'members';
    public $timestamp = false;
    protected $fillable = [
         'name', 'email', 'password', 'age', 'gender', 'phone', 'address', 'role',
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
        return $this->hasMany('App\Models\Task');
    }
    public function projects()
    {
        return $this->belongstoMany('App\Models\Project');
    }
    public function members()
    {
        return $this->belongstoMany('App\Models\Member', 'member_project', 'projects_id', 'members_id');
    }
}
