@extends('layouts.app') 
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div>Sammlungen</div>
        <a class="btn btn-sm btn-primary" href="{{route('collections.create')}}">Sammlung erstellen</a>
    </div>

    <div class="card-body">
        @if (count($collections))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Werkzeuge</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collections as $collection)
                <td>{{$collection->name}}</td>
                <td>
                    <a href="{{route('collections.edit', ['collection' => $collection->id])}}" class="btn btn-sm btn-outline-primary">bearbeiten</a>
                    <form action="{{route('collections.destroy', ['collection' => $collection->id])}}" method="post" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">löschen</button>
                    </form>
                </td>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-info">Erstellen Sie die erste Sammlung!</div>
        @endif
    </div>
</div>
@endsection