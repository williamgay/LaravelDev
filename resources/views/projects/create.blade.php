@extends('../assets.layout')

@section('title', 'Create a New Project')
@section('content')
@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<h1>Create New Project</h1>
<h3>HERE {{$user}}</h3>
<form method = "POST" action="/projects">
  @csrf
  <div>
    <input type="text" class = "projTitle" id = 'projTitle' name="title" placeholder="Project Title" value = "{{old('title')}}">
  </div>
  <div>
    <textarea name="description" class = "projDesc" id="projDesc" rows="8" cols="80" placeholder="Project Description">{{old('description')}}</textarea>
  </div>
  <div>
    <button type="submit" class="btn btn-success" name="button">Create Project</button>
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
@endsection
