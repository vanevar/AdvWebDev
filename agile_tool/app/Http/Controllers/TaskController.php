<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Member;
use App\Task;
use App\Task_status;

use App\Http\MemberController;

use Illuminate\Http\Request;
use View;

class TaskController extends Controller
{
    //Gets the features for the given project id
    public function getTasksByFeature($feature_id){
        return Task::where('task.feature_id', '=', $feature_id)
            ->get();
    }

    public function getMembersByProject($project_id)
    {
        $members = Member::join('project_member AS pm', 'pm.member_id', '=', 'member.id')
        ->where('pm.project_id', '=', $project_id )
        ->get();
        return $members;
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
        //TODO this should be dinamic some how (?)
        $project_id = 1;
        //List of available features
        $features = Feature::all();
        //List of available status Default to New
        $status = Task_status::where('task_status.name', '=', 'TO DO');
        //List of available members (based on project_id)
        $members = $this->getMembersByProject($project_id);
        return View::make('create.createtask')
        ->with('status', $status)
        ->with('members', $members)
        ->with('features', $features);
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
        
            // store
            $task = new Task;
            $task->description = $taskrequest->description;
            $task->estimated_duration = $taskrequest->estimated_duration;
            $task->actual_duration = $taskrequest->actual_duration;
            $task->feature_id = $taskrequest->feature_id;
            $task->status = $taskrequest->status;
            $task->owner_id = $taskrequest->owner_id;
          
            $task->save();
            // redirect
            return Redirect::to('tasks');
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //NOT NEEDED
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //TODO this should be dinamic some how (?)
        $project_id = 1;
        //List of available features
        $features = Feature::all();
        //List of available status Default to New
        $status = Task_status::where('task_status.name', '=', 'TO DO');
        //List of available members (based on project_id)
        $members = $this->getMembersByProject($project_id);
        
        return View::make('edit.edittask')
        ->with('task', $task)
        ->with('status', $status)
        ->with('members', $members)
        ->with('features', $features);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $taskrequest
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $taskrequest, Task $task)
    {
        $task->description = $taskrequest->description;
        $task->estimated_duration = $taskrequest->estimated_duration;
        $task->actual_duration = $taskrequest->actual_duration;
        $task->feature_id = $taskrequest->feature_id;
        $task->status = $taskrequest->status;
        $task->owner_id = $taskrequest->owner_id;

        $project->save();
        return Redirect::to('tasks');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //NOT NEEDED
    }
}
