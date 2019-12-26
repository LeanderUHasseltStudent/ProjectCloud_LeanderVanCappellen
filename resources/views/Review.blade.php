@extends('layouts.app')

@section('content')

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD9D3VOsU9HuI2mzSm5cwsj4n0h38s4O4o&libraries=places"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('locatie'));
        google.maps.event.addListener(places, 'place_changed', function () {

        });
    });
</script>
<span>Location:</span>

    {!! Form::open(['action' => 'ReviewController@getReview', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('locatie', 'Locatie')}}
            {{Form::text('locatie', '', ['class' => 'form-control', 'placeholder' => 'Locatie'])}}
        </div>    
        {{Form::submit('Submit', ['class'])}}
    {!! Form::close() !!}

<a href="/reviews/create" class="btn btn-default">Maak Review</a>

@isset($reviews)
    @if(count($reviews) > 0)
        @foreach($reviews as $review)
        <div class="well">
            {{$review[3]}}
        </div>
        @endforeach
    @else
        <p>No dives found</p>
    @endif
 @endisset
@endsection