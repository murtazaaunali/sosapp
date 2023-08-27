<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    protected $table = 'employee_documents';
       
	protected $guarded = array('id');

    public $timestamps = true;
}
