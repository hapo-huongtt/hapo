<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_name', 'description', 'status_id', 'member_id', 'customer_id', 'began_at', 'finished_at'
    ];
    public function members()
    {
        return $this->belongstoMany(Member::class);
    }
    public function customers()
    {
        return $this->belongto('App\Models\Customer', 'customer_id', 'id');
    }
}
