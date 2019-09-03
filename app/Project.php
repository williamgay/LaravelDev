<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model{
  //Can use fillable to define fields or guarded to prevent values from being passed to fields that don't want the user to have control over.
    protected $guarded = [
      'id', 'updated_at', 'created_at'
    ];
    public function tasks(){
      return $this->hasMany(Task::class);
    }
    public function createTask($attrs){
      $attrs['id'] = $this->id;
      // dd($this->id);
      $this->tasks()->create([
        'description'=>$attrs['description'],
        'details'=>$attrs['details'],
        'project_id'=>$this->id
      ]);
    }
}
