@extends('layouts.app') 
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <span>Künstler</span>
        <a class="btn btn-primary btn-sm" href="{{ route('artists.create') }}">Künstler erstellen</a>
    </div>

    <div class="card-body">
        @if(count($artists))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Geburtstag</th>
                    <th scope="col">Todestag</th>
                    <th scope="col">Werkzeuge</th>
                </tr>
            </thead>
            @foreach($artists as $artist)
            <tr>
                <td>{{$artist->name}}</td>
                <td>
                    @if (!empty($artist->born_at)) {{$artist->born_at->format('d.m.Y')}} @else <i>unbekannt</i> @endif
                </td>
                <td>{{optional($artist->died_at)->format('d.m.Y')}}</td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="{{route('artists.edit', [" artist " => $artist->id])}}">bearbeiten</a>
                    <form action="{{ route('artists.destroy', ['artist' => $artist->id]) }}" method="post" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">löschen</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        @else
        <div class="alert alert-info">Erstellen Sie den ersten Künstler!</div>
        @endif
    </div>
</div>
@endsection