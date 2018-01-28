<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_role';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
