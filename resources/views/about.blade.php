@extends('assets.layout')
@section('title', 'About Us')
@section('content')
    <h1>About Us</h1>
    <p>Blah blah blah</p>
    <ul>
  @foreach($list as $item)
  <li>{{$item}}</li>
@endforeach

  </ul>
    @endsection
