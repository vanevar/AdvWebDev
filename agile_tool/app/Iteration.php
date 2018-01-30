<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Feature;
use App\Project;

class Iteration extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'iteration';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function features(){
        return $this->hasMany(Feature::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
