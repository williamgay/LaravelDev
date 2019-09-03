<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $guarded = [];
    public function project(){
      return $this->belongsTo(Project::class);
    }
    public function showCompleted($completed = true){

      $this->update(['completed'=>$completed]);
      // $task->update([
      //   'completed' => $task->has('completed')
      // ]);
    }
}
