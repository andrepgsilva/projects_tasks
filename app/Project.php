<?php

namespace App;

use App\User;
use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected static function boot() 
    {
        parent::boot();

        static::created(function ($project) {
            Mail::to($project->owner->email)->send(
                new ProjectCreated($project)
            );
        });
    }

    protected $fillable = [
        'title', 'description', 'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        return $this->tasks()->create($task);
    }
}
