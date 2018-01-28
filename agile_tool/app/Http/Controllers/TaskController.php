<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //Gets the features for the given project id
    public function getTasksForFeature($feature_id){
        return Task::where('task.feature_id', '=', $feature_id)
            ->get();
    }
}
