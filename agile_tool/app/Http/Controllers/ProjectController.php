<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
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
        ->join('member AS m', 'm.id', '=', 'project.administrator_id')
        ->where('pm.member_id', '=', $user_id)
        ->select('project.id' 
        , 'project.name' 
        , 'project.description' 
        , 'project.administrator_id'
        , 'project.created_at' 
        , 'm.first_name AS administrator_FirstName'
        , 'm.last_name AS administrator_LastName')
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
        //TODO use UserId for filtering
        $projects = Project::join('member AS m', 'm.id', '=', 'project.administrator_id')
        ->select('project.id' 
        , 'project.name' 
        , 'project.description' 
        , 'project.administrator_id'
        , 'project.created_at' 
        , 'm.first_name AS administrator_FirstName'
        , 'm.last_name AS administrator_LastName')
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
        return View::make('create.createproject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $projectequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $projectequest)
    {   
        // validate
        // read more on validation at http://laravel.com/docs/validation
        /*
        $projectules = array(
            'projectname' => 'required'
        );
        $validator = Validator::make(Input::all(), $projectules);

        // process the project
        if ($validator->fails()) {
            return Redirect::to('projects/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
        */
            // store
            $project = new Project;
            $project->name = $projectequest->projectname;
            $project->description = $projectequest->projectdescription;
          
            $project->administrator_id = 1; // TODO changed to the User's
            $project->created_at = date('Y-m-d H:i:s');

            $project->save();
            // redirect
            return Redirect::to('projects');
        //}
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
        $project->name = $projectequest->name;
        $project->description = $projectequest->description;

        $project.save();
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
