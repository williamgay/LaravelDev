<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  //Can use fillable to define fields or guardable to prevent values from being passed to fields that don't want the user to have control over.
    protected $guardable = [
      'id', 'updated_at', 'created_at'
    ];
}
