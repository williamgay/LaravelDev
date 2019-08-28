@extends('assets.layout')
@section('content')
@foreach($projects as $project)
<p>{{$project->title}}</p>
@endforeach
@if(session()->has('alert-success'))
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session()->get('alert-success') }}
    </div>
@endif

<h1>Projects</h1>


<div class ="container">
  <div class ="row row-striped">
    <div class = "col col-md-3"><h4>Project Title</h4></div>
    <div class = "col col-md-3"><h4>Project Description</h4></div>
    <div class ="col col-md-3"><h4>Date Created</h4></div>
    <div class ="col col-md-3"><h4>Last Updated</h4></div>
  </div>

@foreach($projects as $project)

<div class = "row row-striped">
  <div class = "col col-md-3">{{$project->title}}</div>
  <div class = "col col-md-3">{{$project->description}}</div>
  <div class ="col col-md-3">{{$project->created_at}}</div>
    <div class ="col col-md-3">{{$project->updated_at}}</div>


</div>
@endforeach

</div>
@endsection
