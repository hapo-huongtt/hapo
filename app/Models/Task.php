<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS_ID = [
        0 => 'incomplete',
        1 => 'complete',
    ];
    protected $fillable = [
        'task_name', 'description', 'status_id', 'member_id', 'began_at', 'finished_at',
    ];
    public function members()
    {
        return $this->belongsTo('App\Models\Member', 'member_id', 'id');
    }
}
