<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Acceptance_test_status;
use App\Feature;
use App\Iteration;

class Acceptance_test extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'acceptance_test';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    function test_status()
    {
        return $this->hasMany(Acceptance_test_status::class);
    }

    function feature(){
        return $this->belongsTo(Feature::class);
    }

    function bug(){
        return $this->hasOne(Task::class);
    }
}
