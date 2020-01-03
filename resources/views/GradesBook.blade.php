@extends('layouts.app')

@section('content')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @if($gradesbook->eenster == 1)
                    <h3>1 ster behaald</h3>
                @endif
                @if($gradesbook->tweester == 1)
                    <h3>2 ster behaald</h3>
                @endif
                @if($gradesbook->driester == 1)
                    <h3>3 ster behaald</h3>
                @endif
                @if($gradesbook->vierster == 1)
                    <h3>4 ster behaald</h3>
                @endif
                @if($gradesbook->eensterI == 1)
                    <h3>1 ster instructeur behaald</h3>
                @endif
                @if($gradesbook->tweesterI == 1)
                    <h3>2 ster instructeur behaald</h3>
                @endif
                @if($gradesbook->basicNitrox == 1)
                    <h3>Basis nitrox behaald</h3>
                @endif
                @if($gradesbook->advancedNitrox == 1)
                    <h3>Advanced nitrox behaald</h3>
                @endif
                @if($gradesbook->basicTrimix == 1)
                    <h3>Basis trimix behaald</h3>
                @endif

<a href="/gradesBook/update" class="btn btn-default">Update</a>
       </div>
        </div>
    </div>
</div>


@endsection
