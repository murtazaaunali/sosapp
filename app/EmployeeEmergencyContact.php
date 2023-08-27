<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeEmergencyContact extends Model
{
    protected $table = 'employee_emergency_contact';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
