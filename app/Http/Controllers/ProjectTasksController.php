<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;


class ProjectTasksController extends Controller
{
    public function update(Task $task){
        $this->authorize('view', $task);
      $task->showCompleted(request()->has('completed'));

      return back();
    }
    public function store(Project $project){
        $this->authorize('view', $project);
      $attrs = request()->validate([
        'description'=> ['required', 'min:4', 'max:225'],
        'details' => ['required', 'min:10']
      ]);

      $project->createTask($attrs);
      // Task::create([
      //   'project_id'=>$project->id,
      //   'description'=>request('description'),
      //   'body'=>request('details')
      //
      // ]);
      return back();
    }
}
