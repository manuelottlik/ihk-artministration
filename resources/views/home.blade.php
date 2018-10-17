@extends('layouts.app') 
@section('content')

<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body d-flex justify-content-around">
        <a href="{{route('collections.index')}}" class="text-center">
            <div class="display-1"><i class="fas fa-object-group"></i></div>
            Sammlungen einsehen
        </a>
        <a href="{{route('artists.index')}}" class="text-center">
            <div class="display-1"><i class="fas fa-user"></i></div>
            Künstler einsehen
        </a>
        <a href="{{route('artworks.index')}}" class="text-center">
            <div class="display-1"><i class="fas fa-image"></i></div>
            Kunstwerke einsehen
        </a>
    </div>
</div>
@endsection