<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    //Gets the Projects for the given user id
    public function getProjectsForUser($user_id){
        return Project::join('project_member', 'project_member.project_id', '=', 'project.id')
        ->where('project_member.member_id', '=', $user_id)
        ->get();
    }
}
