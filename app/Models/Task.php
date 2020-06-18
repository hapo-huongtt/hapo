<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_name', 'description', 'status_id', 'member_id', 'began_at', 'finished_at', 'project_id',
    ];
    public function members()
    {
        // return $this->belongsTo('App\Models\Member', 'member_id', 'id');
        return $this->belongsTo(Member::class);
    }
    public function projects()
    {
        // return $this->belongsTo('App\Models\Member', 'member_id', 'id');
        return $this->belongsTo(Project::class);
    }
    public function getMemberNameAttribute()
    {
        $member = Member::findOrFail($this->member_id);
        return $member->name;
    }
    public function getProjectNameAttribute()
    {
        $project = Project::findOrFail($this->project_id);
        return $project->project_name;
    }
}
