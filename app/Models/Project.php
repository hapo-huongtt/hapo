<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'project_name', 'description', 'status', 'member_id',
    ];
    public function members()
    {
        return $this->belongstoMany('App\Moders\Member', 'member_id', 'id');
    }
    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }
}
