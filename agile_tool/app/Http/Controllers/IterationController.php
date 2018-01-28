<?php

namespace App\Http\Controllers;

use App\Iteration;
use Illuminate\Http\Request;

class IterationController extends Controller
{
    //Gets the features for the given project id
    public function getIterationsByProject($project_id){
        return Iteration::where('iteration.project_id', '=', $project_id)
            ->get();
    }
}
