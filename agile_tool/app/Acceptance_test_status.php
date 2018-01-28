<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceptance_test_status extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'acceptance_test_status';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
