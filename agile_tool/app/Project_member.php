<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_member extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_member';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
