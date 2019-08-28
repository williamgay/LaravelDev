@extends('assets.layout')
@section('content')


<h1>Project Details</h1>
<div>
  <h3>{{$project->title}}</h3>
  <p>Created At: {{$project->created_at}}</p>
  <p>Updated: {{$project->updated_at}}</p>
  <p>Description: {{$project->description}}</p>
</div>

@endsection
