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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['action' => 'ReviewController@getReview', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('locatie', 'Locatie')}}
                        {{Form::text('locatie', '', ['class' => 'form-control', 'placeholder' => 'Locatie'])}}
                    </div>    
                    {{Form::submit('Zoek reviews', ['class'])}}
                    {!! Form::close() !!}
                    <a href="/reviews/create" class="btn btn-default">Maak Review</a>
                </div>
            </div>
        </div>
    </div>
    @isset($reviews)
        @if(count($reviews) > 0)
            @foreach($reviews as $review)
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{$review[1]}}</div>
                            <div class="card-body">
                                <div class="well">
                                    <h3>Review: {{$review[3]}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No dives found</p>
        @endif
    @endisset
@endsection