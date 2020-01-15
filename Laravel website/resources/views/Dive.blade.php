@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Locatie: {{$dive->locatie}}</h3>
                        <h3>Datum: {{$dive->datum}}</h3>
                        <h3>Duur: {{$dive->duur}}</h3>
                        <h3>Diepte: {{$dive->diepte}}</h3>
                        <h3>Opmerking: {{$dive->opmerking}}</h3>
                        
                        <a href="/dives/{{$dive->id}}/edit" class="btn btn-default">Edit</a>
                        {!!Form::open(['action' => ['DivesController@destroy', $dive->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>    
@endsection

