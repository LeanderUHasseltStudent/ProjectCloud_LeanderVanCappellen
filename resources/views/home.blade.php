@extends('layouts.app')

@section('content')
    <h1>Dives</h1>
    @if(count($dives) > 0)
        @foreach($dives as $dive)
        <div class="well">
            <h3><a href="/dives/{{$dive->id}}">{{$dive->datum}}</a></h3>
            <small>locatie: {{$dive->locatie}}
        </div>
        @endforeach
    @else
        <p>No dives found</p>
    @endif
@endsection
