<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
