<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'customers';
    public $timestamp = false;
    protected $fillable = [
         'image', 'customer_name', 'address', 'phone', 'email',
    ];
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
