@extends('layouts.app') 
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div>Kunstwerke</div>
        <a class="btn btn-sm btn-primary" href="{{route('artworks.create')}}">Kunstwerk erstellen</a>
    </div>

    <div class="card-body">
        @if(count($artworks))
        <table class="table table-striped" data-toggle="table" data-search="true">
            <thead>
                <tr>
                    <th scope="col" data-sortable="true">Name</th>
                    <th scope="col"data-sortable="true">Sammlung</th>
                    <th scope="col"data-sortable="true">Künstler</th>
                    <th scope="col"data-sortable="true">Wert</th>
                    <th scope="col"data-sortable="true">Datum der Veröffentlichung</th>
                    <th scope="col"data-sortable="true">Datum des Kaufes</th>
                    <th scope="col">Werkzeuge</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artworks as $artwork)
                <tr>
                    <td>{{$artwork->name}}</td>
                    <td>{{$artwork->collection->name}}</td>
                    <td>{{$artwork->artist->name}}</td>
                    <td>{{$artwork->value}}€</td>
                    <td>
                        @if (!empty($artwork->published_at)) {{$artwork->published_at->format('d.m.Y')}} @else <i>unbekannt</i>                        @endif
                    </td>
                    <td>{{$artwork->purchased_at->format('d.m.Y')}}</td>
                    <td>
                        <a class="btn btn-outline-primary btn-sm" href="{{route('artworks.edit', [" artwork " => $artwork])}}">bearbeiten</a>
                        <form action="{{ route('artworks.destroy', ['artwork' => $artwork]) }}" method="post" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">löschen</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-info">Erstellen Sie das erste Kunstwerk!</div>
        @endif
    </div>
</div>
@endsection