@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h3>Aantal duiken: {{$aantalDuiken}}</h3>
                <h3>Aantal duikuren: {{$aantalDuikuren}}</h3>
            </div>
        </div>
    </div>
 </div>
    @if(count($dives) > 0)
        @foreach($dives as $dive)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$dive->locatie}}</div>
                    <div class="card-body">
                        <h3><a href="/dives/{{$dive->id}}">{{$dive->datum}}</a></h3>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p>No dives found</p>
    @endif
@endsection


