<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function franchises()
    {
        return $this->belongsToMany('App\Admin\Franchise')
            ->withTimestamps();
    }
}
