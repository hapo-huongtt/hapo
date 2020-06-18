<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_name', 'description', 'status_id', 'customer_id', 'began_at', 'finished_at',
    ];
    public function members()
    {
        return $this->belongsToMany(Member::class);
    }
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
    public function getCustomerNameAttribute()
    {
        $customer = Customer::findOrFail($this->customer_id);
        return $customer->customer_name;
    }
    public function tasks()
    {
        return $this->hasMany('App\Models\task');
    }
}
