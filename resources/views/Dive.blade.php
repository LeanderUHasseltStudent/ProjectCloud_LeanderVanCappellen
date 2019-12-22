@extends('layouts.app')

@section('content')
<a href="/dives/{{$dive->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action' => ['DivesController@destroy', $dive->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}    

@endsection

