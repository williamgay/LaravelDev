@extends('../assets.layout')

@section('title', 'Create a New Project')
@section('content')
@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<h1>Create New Project</h1>
<form method = "POST" action="/projects">
  @csrf
  <div>
    <input type="text" name="title" placeholder="Project Title" required>
  </div>
  <div>
    <textarea name="description" rows="8" cols="80" placeholder="Project Description" required></textarea>
  </div>
  <div>
    <button type="submit" class="btn btn-success" name="button">Create Project</button>
  </div>
</form>
@endsection
