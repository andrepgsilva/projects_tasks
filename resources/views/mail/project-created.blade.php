@component('mail::message')

{{ $project->title }}

{{ $project->description }}

@component('mail::button', ['url' => '/projects/{{$project->id}}'])
View Project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
