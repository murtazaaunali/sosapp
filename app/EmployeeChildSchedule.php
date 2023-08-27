<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeChildSchedule extends Model
{
    protected $table = 'child_scheduling';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
