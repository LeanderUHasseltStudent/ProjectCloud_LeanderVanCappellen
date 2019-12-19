@extends('layouts.app')

@section('content')
    <h1>Maak duik</h1>
    {!! Form::open(['url' => '/home/test/test2']) !!}
        <div class="form-group">
            {{Form::label('locatie', 'Locatie')}}
            {{Form::text('locatie', '', ['class' => 'form-control', 'placeholder' => 'Body Test'])}}
        </div>
        <div class="form-group">
            {{Form::label('duur', 'Duur')}}
            {{Form::text('duur', '', ['class' => 'form-control', 'placeholder' => 'Body Test'])}}
        </div>
        {{Form::submit('Submit', ['class'])}}
    {!! Form::close() !!}
@endsection

