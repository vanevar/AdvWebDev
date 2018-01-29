<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feature';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
            'title',
            'functionality',
            'benefit',
            'priority',
            'iteration_id',
            'user_role_id',
            'project_id'
        ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function iteration(){
        return $this->belongsTo(Iteration::class);
    }

    public function user_role(){
        return $this->belongsTo(User_role::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function acceptance_tests(){
        return $this->hasMany(Acceptance_test::class);
    }
}
