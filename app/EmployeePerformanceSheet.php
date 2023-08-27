<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePerformanceSheet extends Model
{
    protected $table = 'employee_performance_sheet';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
