@extends('layouts.app') 
@section('content')

<div class="card">
    <div class="card-header">
        @if($collection->id) Sammlung bearbeiten @else Sammlung erstellen @endif
    </div>

    <div class="card-body">
        <form action="{{route('collections.store')}}" method="post" id="co-edit">
            @csrf
            <input type="hidden" name="id" value="{{$collection->id}}">
            <div class="form-group">
                <label for="co-name">Name</label>
                <input type="text" name="name" id="co-name" value="{{$collection->name}}" class="form-control">
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-sm btn-success float-right" form="co-edit">Sammlung speichern</button>
    </div>
</div>
@endsection