<?php

namespace App\Http\Controllers;

use App\Acceptance_test;
use Illuminate\Http\Request;

class AcceptanceTestController extends Controller
{
    //Gets the features for the given project id
    public function getAcceptanceTestsForFeature($feature_id){
        return Acceptance_test::where('acceptance_test.feature_id', '=', $feature_id)
            ->get();
    }
}
