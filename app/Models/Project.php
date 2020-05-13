<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'project_name', 'description', 'status_id', 'member_id', 'customer_id',
    ];
    public function members()
    {
        return $this->belongstoMany('App\Moders\Member', 'member_project');
    }
    public function customers()
    {
        return $this->hasMany('App\Models\Customer')
        ->withPivot('began_at', 'finished_at')
        ->withTimestamps();
    }
    public function tasks()
    {
        return $this->howMany('App\Moders\Task');
    }
}
