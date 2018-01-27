<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    //Gets the Projects for the given user id
    public function getProjectForUser($user_id){

        return Project::join('project_members', function ($join, $user_id) {
            $join->on('project_member.project_id', '=', 'project.id')->andON('project_member.member_id', '=', $user_id);
        })->get();
    }
}
