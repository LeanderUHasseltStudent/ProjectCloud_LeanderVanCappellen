@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['url' => '/gradesBook/update/submit','method'=>'post']) !!}
                <br>
					{!! Form::label('1 ster', '1 ster') !!}
					{!! Form::checkbox('1 ster', '1 ster') !!}
				<br>
					{!! Form::label('2 ster', '2 ster') !!}
					{!! Form::checkbox('2 ster', '2 ster') !!}
				<br>
					{!! Form::label('3 ster', '3 ster') !!}
					{!! Form::checkbox('3 ster', '3 ster') !!}
				<br>
					{!! Form::label('4 ster', '4 ster') !!}
					{!! Form::checkbox('4 ster', '4 ster') !!}
				<br>
					{!! Form::label('1 ster instructeur', '1 ster instructeur') !!}
					{!! Form::checkbox('1 ster instructeur', '1 ster instructeur') !!}
				<br>
					{!! Form::label('2 ster instructeur', '2 ster instructeur') !!}
					{!! Form::checkbox('2 ster instructeur', '2 ster instructeur') !!}
				<br>
					{!! Form::label('basis nitrox', 'basis nitrox') !!}
					{!! Form::checkbox('basis nitrox', 'basis nitrox') !!}
				<br>
					{!! Form::label('geavanceerde nitrox', 'geavanceerde nitrox') !!}
					{!! Form::checkbox('geavanceerde nitrox', 'geavanceerde nitrox') !!}
				<br>
					{!! Form::label('basis trimix', 'basis trimix') !!}
					{!! Form::checkbox('basis trimix', 'basis trimix') !!}
				<br>
					{!! Form::submit('Save', $attributes = ['class'=>'button']) !!}
					{!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection