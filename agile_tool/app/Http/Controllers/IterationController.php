<?php

namespace App\Http\Controllers;

use App\Iteration;
use App\Project;

use Illuminate\Http\Request;

class IterationController extends Controller
{
    //Gets the features for the given project id
    public function getIterationsByProject($project_id){
        return Iteration::where('iteration.project_id', '=', $project_id)
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
        $iterations = Iteration::join('project as p', 'p.id', '=', 'iteration.project_id')
        ->select('iteration.id'
        , 'iteration.deadline'
        , 'p.name AS project_name' )
        ->get();

        return View::make('project.iteration')
            ->with('iteration', $iterations);
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
        //List of available projects
        $projects = Project::all();
        return View::make('create.createiteration')
        ->with('projects', $projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $iterationrequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $iterationrequest)
    {   
        return $iterationrequest;
        
            // store
            $iteration = new Iteration;
            $iteration->deadline = $iterationrequest->deadline;
            $iteration->project_id = $iterationrequest->project_id;
          
            $iteration->save();
            // redirect
            return Redirect::to('iterations');
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\iteration  $iteration
     * @return \Illuminate\Http\Response
     */
    public function show(iteration $iteration)
    {
        //NOT NEEDED
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\iteration  $iteration
     * @return \Illuminate\Http\Response
     */
    public function edit(iteration $iteration)
    {
        //NOT NEEDED
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $iterationrequest
     * @param  \App\iteration  $iteration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $iterationrequest, iteration $iteration)
    {
        //NOT NEEDED
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\iteration  $iteration
     * @return \Illuminate\Http\Response
     */
    public function destroy(iteration $iteration)
    {
        //NOT NEEDED
    }
}
