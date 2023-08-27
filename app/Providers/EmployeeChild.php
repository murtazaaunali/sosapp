<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeChild extends Model
{
    protected $table = 'childs';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
