@extends('layouts.app')

@section('content')
<div class="container">
    Vista del post
    <hr>
    Titulo:
    <br>
    {{$post->title}}
    <br>
    Contenido:
    <br>
    {{$post->status }}
    <br>
    <a class="btn btn-primary" href="{{ url('post') }}" >volver</a>

</div>
@endsection