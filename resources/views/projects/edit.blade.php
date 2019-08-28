@extends('assets.layout')
@section('title', "Edit Project")

@section('content')
<h1>Edit Project</h1>
<form class="" action="/projects/{{$project->id}}" method="post">
  {{method_field('PATCH')}}
    {{csrf_field()}}
  <div class="field">
    <label for="title" class='label'>Title</label>
    <div class ="control">
      <input type="text" class="input" name="title" placeholder="Title" value="{{$project->title}}" required>
    </div>

  </div>
  <div class="field">
    <label for="description" class ="label">Description</label>
    <div class="control">
      <textarea name="description" class="textarea" rows="8" cols="80" required>{{$project->description}}</textarea>

    </div>

  </div>
<button type="submit" class ="btn btn-primary" name="submit">Update</button>
</form>
@endsection
