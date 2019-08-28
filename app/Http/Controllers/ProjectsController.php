<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use \App\Project;
class ProjectsController extends Controller
{
  public function show(Project $project){
    //$project = Project::findOrFail($id);
    return view('projects.show', compact('project'));
  }
    public function index()
    {
      $user = Auth::user();
      $projects = Project::all();
      return view('projects.index',['projects'=>$projects, 'user'=>$user]);
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
      $attrs = request()->validate([
        'title'=> ['required', 'min:7', 'max:225'],
        'description' => ['required', 'min:10']
      ]);
      //Could also say Project::create(request(['title', 'description']))
      // Personally, I like the below method better as it FEELS like I have more control, though in truth they are the same thing.
      Project::create($attrs);
      // $proj = new Project();
      // $proj->title = request('title');
      // $proj->description = request('description');
      // $proj->save();

      //return \Redirect::back();

      return redirect('/projects')->with('alert-success', 'The project was saved successfully');
    }
    public function edit(Project $project){
      //$project = Project::findOrFail($id);
      return view('projects.edit',compact('project'));
    }
    public function update(Project $project){
    //  $proj = Project::find($id);
      $project->title = request('title');
      $project->description = request('description');
      $project->save();
      return redirect('/projects')->with('alert-success', 'The data was saved successfully');
    }
    public function destroy(Project $project){

    //  Project::findOrFail($id)->delete();
    $project->delete();
      return redirect('/projects')->with('alert-success', 'The project was deleted successfully');
    }

}
