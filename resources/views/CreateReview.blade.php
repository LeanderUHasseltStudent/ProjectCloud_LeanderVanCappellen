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
    <h1>Maak Review</h1>
    {!! Form::open(['action' => 'ReviewController@postReview', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('locatie', 'Locatie')}}
            {{Form::text('locatie', '', ['class' => 'form-control', 'placeholder' => 'Locatie'])}}
        </div>
        <div class="form-group">
            {{Form::label('review', 'Review')}}
            {{Form::text('review', '', ['class' => 'form-control', 'placeholder' => 'Review'])}}
        </div>
        {{Form::submit('Submit', ['class'])}}
    {!! Form::close() !!}
@endsection
