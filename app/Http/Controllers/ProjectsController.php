<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class ProjectsController extends Controller
{
    public function index()
    {

      $projects = \App\Project::all();

      return view('projects.index',['projects'=>$projects]);
    }
    public function create()
    {
      return view('projects.create');
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
}
