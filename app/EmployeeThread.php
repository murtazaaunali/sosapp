<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeThread extends Model
{
    protected $table = 'employee_threads';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
