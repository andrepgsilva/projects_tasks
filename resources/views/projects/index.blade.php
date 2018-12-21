@extends('layout')

@section('content')
    <ul>
        @foreach($projects as $project)
            <li>
                <a href="/projects/{{$project->id}}">{{$project->title}}</a>
            </li>
        @endforeach
    </ul>
    <a href="/projects/create">Create Project</a>
@endsection