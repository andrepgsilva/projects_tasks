@extends('layout')

@section('content')
    <form method="POST" action="/projects/{{$project->id}}">
        @csrf
        @method('PATCH')
        <label for="name">
        Title <input type="text" name="name" value="{{$project->title}}">
        </label> <br />
        <label for="description">
        Description <input type="text" name="description" value="{{$project->description}}">
        </label>
        <input type="submit" value="OK">
    </form>
    <br />
    <form method="POST" action="/projects/{{$project->id}}">
        @csrf
        @method('DELETE')
        <input style="color: red; border:1px solid red;" type="submit" value="DELETE">
    </form><br />
    <a href="/projects">Back To Home</a>
@endsection