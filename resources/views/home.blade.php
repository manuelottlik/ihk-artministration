@extends('layouts.app') 
@section('content')
<div class="d-flex justify-content-around align-items-center flex-wrap">

@php
    function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }
    function random_color() {
        return random_color_part() . random_color_part() . random_color_part();
    } 
@endphp

@foreach ($artworks as $artwork)
    <img src="https://via.placeholder.com/{{rand(200, 600)}}x{{rand(200, 600)}}/{{random_color()}}" alt="{{$artwork->name}}" style="width: 30%; padding: 10px;">
@endforeach
@endsection