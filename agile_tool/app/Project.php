<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function features(){
        return $this->hasMany(Feature::class);
    }

    public function addFeature($feature){
        $this->features()->create(compact('feature'));
    }
}
