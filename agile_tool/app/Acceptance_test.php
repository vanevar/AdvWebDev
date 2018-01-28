<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
