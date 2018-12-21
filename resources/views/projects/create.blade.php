@extends('layout')

@section('content')
    <form action="/projects" method="POST">
        @csrf
        <label for="title">
        Title <input style="{{$errors->has('title') ? 'border: 1px solid red;' : ''}}" type="text" name="title" value={{ old('title')}}>
        </label>
        <label for="description">
            Description <input style="{{$errors->has('description') ? 'border: 1px solid red;' : ''}}" type="text" name="description">
        </label>
        <input type="submit" value="Ok">
    </form><br />
    @include('errors')
    <a href="/projects">Back To Home</a>
@endsection
