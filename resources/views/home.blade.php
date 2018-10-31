@extends('layouts.app') 
@section('content') @foreach ($artworks as $artwork)
<div class="card">
    <div class="card-header">{{$artwork->name}} von {{$artwork->artist->name}}</div>
    <div class="card-body">
        <img src="{{Storage::url($artwork->file)}}" />
    </div>
    <div class="card-footer">
        <table class="table">
            <tr>
                <th>1</th>
                <td>2</td>
            </tr>
        </table>
    </div>
</div><br> @endforeach
@endsection