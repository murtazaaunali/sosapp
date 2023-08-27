<?php

namespace App\Client;

use Illuminate\Database\Eloquent\Model;

class AssignedPickup extends Model
{
    protected $table = 'client_assigned_pickups';

    public $timestamps = true;

    protected $primaryKey = 'id';
}
