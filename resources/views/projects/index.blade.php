@extends('assets.layout')
@section('content')
@if(session()->has('alert-success'))
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session()->get('alert-success') }}
    </div>
@endif
{{$user}}
<h1>Projects</h1>


<div class ="container">
  <div class ="row row-striped">
    <div class = "col col-md-2"><h4>Project Title</h4></div>
    <div class = "col col-md-2"><h4>Project Description</h4></div>
    <div class ="col col-md-2"><h4>Date Created</h4></div>
    <div class ="col col-md-2"><h4>Last Updated</h4></div>
    @if($user && $user->type== 'admin')
    <div class ="col col-md-1"><h4>Creator</h4></div>
    <div class = "col col-md-1"><h4>Edit</h4></div>
      <div class = "col col-md-1"><h4>Delete</h4></div>
    @endif
  </div>

@foreach($projects as $project)

<div class = "row row-striped">
  <div class = "col col-md-2"><a href="/projects/{{$project->id}}">{{$project->title}}</a></div>
  <div class = "col col-md-2">{!! $project->description !!}</div>
  <div class ="col col-md-2">{{$project->created_at}}</div>
    <div class ="col col-md-2">{{$project->updated_at}}</div>
    @if($user && $user->type== 'admin')
      <div class = "col col-md-1">{{$project->ownerName}}</div>
  <div class = "col col-md-1"><a href = "/projects/{{$project->id}}/edit"><button class = "btn btn-warning">Edit</button></a></div>
  <form class="form" action="/projects/{{$project->id}}" method="post">
     @method('DELETE')
     @csrf
  <div class = "col col-md-1 form-group"><button type = "submit" class = "btn btn-danger delete-project">Delete</button></div>
    </form>
    @endif
</div>
@endforeach
<script>
    $('.delete-project').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>
</div>
@endsection
