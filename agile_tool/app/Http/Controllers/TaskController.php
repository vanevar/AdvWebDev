<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Task;

use Illuminate\Http\Request;
use View;

class TaskController extends Controller
{
    //Gets the features for the given project id
    public function getTasksByFeature($feature_id){
        return Task::where('task.feature_id', '=', $feature_id)
            ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO FILTER
        $tasks = Task::join('feature as f', 'f.id', '=', 'task.feature_id')
        ->join('task_status as ts', 'ts.id', '=', 'task.status_id')
        ->join('member AS m', 'm.id', '=', 'task.owner_id')
        ->select('task.id'
        , 'task.description'
        , 'task.estimated_duration'
        , 'task.actual_duration'
        , 'feature_id'
        , 'status_id'
        , 'owner_id' 
        , 'f.title AS feature_title'
        , 'ts.name AS task_status'
        , 'm.first_name AS owner_name'
        , 'm.last_name AS owner_last_name')
        ->get();

        return View::make('project.task')
            ->with('task', $tasks);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('create.createtask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $taskrequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $taskrequest)
    {   
        return $taskrequest;
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
            $task = new Task;
            $task->name = $taskrequest->projectname;
            $task->description = $taskrequest->projectdescription;
          
            $task->save();
            // redirect
            return Redirect::to('tasks');
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
        $project->name = $projectequest->projectname;
        $project->description = $projectequest->projectdescription;

        $project->save();
        return Redirect::to('projects');
        //return $projectequest;
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
