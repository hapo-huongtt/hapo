<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_name', 'description', 'status_id', 'member_id', 'began_at', 'finished_at',
    ];
    public function members()
    {
        return $this->belongsTo('App\Models\Member', 'member_id', 'id');
    }
    public function getMemberNameAttribute()
    {
        $member = Member::findOrFail($this->member_id);
        return $member->name;
    }
}
