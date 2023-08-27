<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentTrainingNotes extends Model
{
    protected $table = 'parent_training_notes';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
