@extends('layouts.app')

@section('content')
    <h1>Maak duik</h1>
    {!! Form::open(['url' => '/home/test/test2']) !!}
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
            {{Form::label('duik buddy 1', 'Duik buddy 1')}}
            {{Form::text('duik buddy 1', '', ['class' => 'form-control', 'placeholder' => 'Duik buddy 1'])}}
        </div>
        <div class="form-group">
            {{Form::label('duik buddy 2', 'Duik buddy 2')}}
            {{Form::text('duik buddy 2', '', ['class' => 'form-control', 'placeholder' => 'Duik buddy 2'])}}
        </div>
        <div class="form-group">
            {{Form::label('opmerking', 'Opmerking')}}
            {{Form::text('opmerking', '', ['class' => 'form-control', 'placeholder' => 'Opmerking'])}}
        </div>    
        {{Form::submit('Submit', ['class'])}}
    {!! Form::close() !!}
@endsection

