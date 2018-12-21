@extends('layout')

@section('content')
    <div>
        <h1>{{$project->title}}</h1>
        <p>
            {{$project->description}}
        </p>
        <a href="/projects/{{$project->id}}/edit">Edit</a><br />
    </div>
    @if($project->tasks->count())
        <div style="padding-top: 5vh;" class="tasks">
            <ul>
                @foreach ($project->tasks as $task)
                    <form action="/completed-task/{{$task->id}}" method="POST">
                        @method('PATCH')
                        @if ($task->completed)
                            @method('DELETE')
                        @endif
                        @csrf
                        <label class="{{$task->completed ? 'completed-task' : ''}}" for="completed">
                            <input type="checkbox" name="completed" 
                                onChange="this.form.submit()"
                                {{$task->completed ? 'checked' : ''}}>
                            {{$task->description}}
                        </label>
                    </form>
                @endforeach
            </ul>
        </div>
    @endif
    <br />
    <br />

    <div class="newtasks">
        <form action="/projects/{{$project->id}}/task" method="POST">
            @csrf
            <h1>New Task</h1>
            <label for="project">
                Description <input style="{{$errors->has('description') ? 'border: 1px solid red;' : ''}}"
                type="text" name="description">
            </label><br />
            <input type="submit" value="OK">
        </form>
    </div><br />
    @include('errors')
    <a href="/projects">Back To Home</a>
@endsection