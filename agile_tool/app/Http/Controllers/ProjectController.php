<?php

namespace App\Http\Controllers;

use App\Project;
use App\Project_member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use View;


class ProjectController extends Controller
{
    //Gets the Projects for the given user id
    public function getProjectsByUser($user_id){
        //Get all the projects by the given user Id
        $projects = Project::join('project_member AS pm', 'pm.project_id', '=', 'project.id')
        ->join('user AS u', 'u.id', '=', 'project.administrator_id')
        ->where('pm.member_id', '=', $user_id)
        ->select('project.id' 
        , 'project.name' 
        , 'project.description' 
        , 'project.administrator_id'
        , 'project.created_at' 
        , 'u.firstname AS administrator_FirstName'
        , 'u.lastname AS administrator_LastName')
        ->get();

        //return $projects;
        // load the view and pass the projects
        return View::make('project.project')
            ->with('project', $projects);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
 
        $projects = Project::join('project_member AS pm', 'pm.project_id', '=', 'project.id')
        ->join('users AS u', 'u.id', '=', 'project.administrator_id')
        ->where('pm.member_id', '=', $user_id)
        ->select('project.id' 
        , 'project.name' 
        , 'project.description' 
        , 'project.administrator_id'
        , 'project.created_at' 
        , 'u.firstname AS administrator_FirstName'
        , 'u.lastname AS administrator_LastName')
        ->get();

        return View::make('project.project')
            ->with('project', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Auth::user();
        return View::make('create.createproject')
        ->with('member', $member);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $projectequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $projectequest)
    {   
        
        // store
        $project = new Project;
        $project->name = $projectequest->projectname;
        $project->description = $projectequest->projectdescription;
          
        $project->administrator_id = Auth::id();
        $project->created_at = date('Y-m-d H:i:s');

        $project->save();

        //create project_member relationship
        $project_member = new Project_member;
        $project_member->member_id = Auth::id();
        $project_member->project_id = $project->id;
        $project_member->role_id = 2; //OWNER
        $project_member->added_at = $project->created_at;
        $project_member->save();

        // redirect
        return Redirect::to('projects');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //NOT NEEDED
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return View::make('edit.editproject')
            ->with('project', $project);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $projectequest
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $projectequest, Project $project)
    {
        $project->name = $projectequest->projectname;
        $project->description = $projectequest->projectdescription;

        $project->save();
        return Redirect::to('projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //NOT NEEDED
    }
}
