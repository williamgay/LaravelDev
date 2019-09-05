<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Arr;
use Auth;
use Session;
use \App\Project;
use \App\User;
use \App\Mail\ProjectCreated;

class ProjectsController extends Controller
{

    public function show(Project $project)
    {
        $user = Auth::user();
        if ($user) {
            $owner = auth()->user()->owns($project);
        } else {
            $owner = false;
        }
        //$this->authorize('view', $project);
        // abort_unless(auth()->user()->owns($project) || $user-type== 'admin', 403);
        return view('projects.show', ['project' => $project, 'user' => $user, 'owner' => $owner]);
    }

    public function index()
    {
        //  dd(auth()->user()->name);
        if (auth()->guest()) {
            $projects = Project::all();
            return view('projects.index', ['projects' => $projects]);
        }
        $user = auth()->user();
        $userList = array();
        if ($user && $user->type == 'admin') {

            $users = User::all();
            //  dd($users);

            foreach ($users as $mem) {

                $userList["$mem->id"] = $mem;
            }
            $projects = Project::all();

            foreach ($projects as $project) {
                if (array_key_exists($project->owner_id, $userList)) {
                    $project['ownerName'] = $userList[$project->owner_id]->name;
                }
            }

        } elseif ($user) {
            $projects = Project::where('owner_id', $user->id)->get();
        }

        // $projects = Project::all();
        return view('projects.index', ['projects' => $projects, 'user' => $user]);
    }

    public function create()
    {
        $user = Auth::user();
        if ($user) {
            return view('projects.create', ['user' => $user]);

        } else {
            return view('/welcome');
        }
    }

    public function store(Project $project)
    {
        $this->authorize('view', $project);
        $user = Auth::user();
        $attrs = request()->validate([
            'title' => ['required', 'min:4', 'max:225'],
            'description' => ['required', 'min:10']
        ]);
        $attrs['owner_id'] = $user->id;
        //Could also say Project::create(request(['title', 'description']))
        // Personally, I like the below method better as it FEELS like I have more control, though in truth they are the same thing.
        Project::create($attrs);
        // $proj = new Project();
        // $proj->title = request('title');
        // $proj->description = request('description');
        // $proj->save();

        //return \Redirect::back();
        \Mail::to(['williamgay1962@gmail.com', $user->email])->send(
            new ProjectCreated($project)
        );
        return redirect('/projects')->with('alert-success', 'The project was saved successfully');
    }

    public function edit(Project $project)
    {
        //$project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        //  $proj = Project::find($id);
        $project->title = request('title');
        $project->description = request('description');
        $project->save();
        return redirect('/projects')->with('alert-success', 'The data was saved successfully');
    }

    public function destroy(Project $project)
    {

        //  Project::findOrFail($id)->delete();
        $project->delete();
        return redirect('/projects')->with('alert-success', 'The project was deleted successfully');
    }

}
