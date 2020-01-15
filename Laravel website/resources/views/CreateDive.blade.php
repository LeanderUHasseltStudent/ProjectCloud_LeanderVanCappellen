@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => 'DivesController@store', 'method' => 'POST']) !!}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1>Maak duik</h1>
                    <div class="form-group">
                        {{Form::label('datum', 'Datum')}}
                        {{Form::text('datum', '', ['class' => 'form-control', 'placeholder' => 'Datum'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('locatie', 'Locatie')}}
                        {{Form::text('locatie', '', ['class' => 'form-control', 'placeholder' => 'Locatie'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('duur', 'Duur')}}
                        {{Form::text('duur', '', ['class' => 'form-control', 'placeholder' => 'duur'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('diepte', 'Diepte')}}
                        {{Form::text('diepte', '', ['class' => 'form-control', 'placeholder' => 'diepte'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('opmerking', 'Opmerking')}}
                        {{Form::text('opmerking', '', ['class' => 'form-control', 'placeholder' => 'Opmerking'])}}
                    </div>  
                     {{Form::submit('Submit', ['class'])}}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

