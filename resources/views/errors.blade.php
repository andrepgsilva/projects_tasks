@if ($errors->any())
    <div style="background: red; color: #fff;" class="errors">
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif