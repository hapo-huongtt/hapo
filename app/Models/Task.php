<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = [
        'task_name', 'description', 'status', 'member_id',
    ];
    public function members()
    {
        return $this->hasMany('App\Models\Member', 'member_id', 'id');
    }
}
