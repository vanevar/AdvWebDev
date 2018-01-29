<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Feature;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id)
    {
        $project = Project::find($project_id);
        return view('create.createfeature',  compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($project_id)
    {
        $project = Project::find($project_id);
        $feature = Feature::create([
            'title' =>request('title'),
            'functionality' =>request('functionality'),
            'benefit' =>request('benefit'),
            'priority' =>request('priority'),
            'iteration_id' =>request('iteration_id'),
            'user_role_id' =>request('user_role_id'),
            'project_id' => $project->id
        ]);
        echo $project->features;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($project_id)
    {
        $project = Project::find($project_id);
        echo $project->features;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($feature_id)
    {
        $feature = Feature::find($feature_id);
        echo $feature;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($feature_id)
    {
        $feature = Feature::find($feature_id);
        $feature->title = request('title');
        $feature->functionality = request('functionality');
        $feature->benefit = request('benefit');
        $feature->priority = request('priority');
        $feature->iteration_id = request('iteration_id');
        $feature->user_role_id = request('user_role_id');
        $feature->project_id = request('project_id');
        $feature->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
