<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
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
        // load the create form (app/views/nerds/create.blade.php)
        //return View::make('nerds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        TO DO
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('nerds/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $nerd = new Nerd;
            $nerd->name       = Input::get('name');
            $nerd->email      = Input::get('email');
            $nerd->nerd_level = Input::get('nerd_level');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('nerds');
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(r $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(r $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, r $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(r $r)
    {
        //
    }
}
