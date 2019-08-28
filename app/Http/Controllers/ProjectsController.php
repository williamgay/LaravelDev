<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
class ProjectsController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      $projects = \App\Project::all();
      return view('projects.index',['projects'=>$projects]);
    }
    public function create()
    {
      $user = Auth::user();
      if($user && $user->type == 'admin'){
      return view('projects.create');
    }else{
      return view('/welcome');
    }
    }
    public function store()
    {
      $proj = new \App\Project();
      $proj->title = request('title');
      $proj->description = request('description');
      $proj->save();
      Session::flash('message', "Special message goes here");

      //return \Redirect::back();

      return redirect('/projects')->with('alert-success', 'The data was saved successfully');
    }
    public function edit($id){
      $project = \App\Project::find($id);
      return view('projects.edit',compact('project'));
    }
    public function update(){
      dd('hello');
    }
    public function destroy(){

    }
}
