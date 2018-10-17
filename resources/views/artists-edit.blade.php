@extends('layouts.app') 
@section('content')

<div class="card">
    <div class="card-header">
        @if($artist->id) Künstler bearbeiten @else Künstler erstellen @endif
    </div>

    <div class="card-body">
        <form action="{{route('artists.store')}}" method="post" id="at-edit">
            @csrf

            <input type="hidden" name="id" value="{{$artist->id}}" />

            <div class="form-group">
                <label for="at-name">Name</label>
                <input type="text" name="name" class="form-control" id="at-name" value="{{$artist->name}}" />
            </div>

            <div class="form-group">
                <label for="at-born_at">Geburtstag</label>
            <input type="date" name="born_at" class="form-control" id="at-born_at" max="{{ now()->format('Y-m-d') }}" value="{{optional($artist->born_at)->format('Y-m-d')}}" />
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-success float-right" form="at-edit" type="submit">
            Künstler speichern
        </button>
    </div>
</div>
@endsection