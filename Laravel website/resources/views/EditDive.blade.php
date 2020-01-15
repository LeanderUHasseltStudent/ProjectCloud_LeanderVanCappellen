@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1>Bewerk duik</h1>
                    {!! Form::open(['action' => ['DivesController@update', $dive->id], 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('datum', 'Datum')}}
                        {{Form::text('datum', $dive->datum, ['class' => 'form-control', 'placeholder' => 'Datum'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('locatie', 'Locatie')}}
                        {{Form::text('locatie', $dive->locatie, ['class' => 'form-control', 'placeholder' => 'Locatie'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('duur', 'Duur')}}
                        {{Form::text('duur', $dive->duur, ['class' => 'form-control', 'placeholder' => 'duur'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('diepte', 'Diepte')}}
                        {{Form::text('diepte', $dive->diepte, ['class' => 'form-control', 'placeholder' => 'diepte'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('opmerking', 'Opmerking')}}
                        {{Form::text('opmerking', $dive->opmerking, ['class' => 'form-control', 'placeholder' => 'Opmerking'])}}
                    </div>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class'])}}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
