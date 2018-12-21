<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Task;

class CompletedTasksController extends Controller
{
    public function update(Task $task)
    {
        $task->update(['completed'=>true]);
        return back();
    }

    public function destroy(Task $task)
    {
        $task->update(['completed'=>false]);
        return back();
    }
}
