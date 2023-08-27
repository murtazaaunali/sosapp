<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Franchisee extends Model
{
    protected $table = 'franchisees';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function franchises()
    {
        return $this->belongsToMany('App\Admin\Franchise')
            ->withTimestamps();
    }
}
