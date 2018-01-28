<?php

namespace App\Http\Controllers;

use App\Feature;
use Illuminate\Http\Request;


class FeatureController extends Controller
{
    //Gets the features for the given project id
    public function getFeaturesForProject($project_id){
        return Feature::where('feature.project_id', '=', $project_id)
            ->get();
    }
}
