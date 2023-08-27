<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $table = 'franchises';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function franchisees()
    {
        return $this->belongsToMany('App\Admin\Franchisee')
            ->withTimestamps();
    }

    public function tasks()
    {
        return $this->belongsToMany('App\Admin\Task')
            ->withTimestamps();
    }
}
