<?php

namespace App\Http\Controllers;

use App\Project;
use App\Feature;
use App\User_role;

use App\Acceptance_test;
use Illuminate\Http\Request;

class AcceptanceTestController extends Controller
{
    //Gets the features for the given project id
    public function getAcceptanceTestsByFeature($feature_id){
        return Acceptance_test::where('acceptance_test.feature_id', '=', $feature_id)
            ->get();
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($feature_id)
    {
        $feature = Feature::find($feature_id);
        return view('project.acceptancetest', compact('feature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($feature_id)
    {
        $feature = Project::find($feature_id);
        return view('create.createacpttest',  compact(['project', 'user_roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($feature_id)
    {
        $feature = Project::find($feature_id);
        $acceptance_test = Acceptance_test::create([
            'description' =>request('description'),
            'test_result' =>request('test_result'),
            'feature_id' => $feature->id
        ]);

        return Redirect::to('/features/'.$project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($feature_id)
    {
        $feature = Feature::find($feature_id);
        echo $feature->acceptance_tests;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($acceptance_test_id)
    {
        $acceptance_test = Acceptance_test::find($acceptance_test_id);
        return view('edit.editacpttest',  compact('acceptance_test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($acceptance_test_id)
    {
        $acceptance_test = Acceptance_test::find($acceptance_test_id);
        $acceptance_test->description = request('title');
        $acceptance_test->test_result = request('functionality');
        //no Feature id since we will not change it
        // no Bug id since it should be linked when creting the bug  
        $acceptance_test->save();

        return Redirect::to('/acceptances-test/'.$acceptance_test->feature_id);
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
