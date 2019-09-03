@extends('assets.layout')
@section('content')
<h1>Project Details</h1>
<p>{!! $project->title !!}</p>
<p>{!! $project->description !!}</p>
<h3>Project Tasks</h3>
@if($project->tasks->count())
<div class = "card">
  @foreach($project->tasks as $task)

  <div>
    <form action = "/tasks/{{$task->id}}" method ="POST">
      <!-- @method("PATCH") -->
      @csrf
      <label for="completed" class = "checkbox {{$task->completed ? 'is-complete' : ''}}">{!! $task->description !!}</label>
      <input type ="checkbox" name="completed" onChange = "this.form.submit()" {{$task->completed ? 'checked' : ''}}>
    </form>
    <p>{!! $task->details !!}</p>
    <hr>
    </div>

  @endforeach
  </div>
@endif

<div class="card">
<form class="createTask" action="/projects/{{$project->id}}/tasks" method="post">
  @csrf
<div class="field">
  <label for="description">Enter Name for New Task:</label>
    <div class="control">
      <input type="text" class = "projTitle" required name="description">
    </div>
    <div class="control" style = "padding-top:15px;">
      <label for="body">Enter Task Details:</label><br></br>
    <textarea name="details" class = "projDesc" rows=6 cols=25 required></textarea>
    </div>
    <div class="control">
      <button type = "submit" class = 'btn btn-primary'>Add Task</button>

    </div>
</div>
@if($errors->any())

<div class ="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
</form>
</div>

@endsection
