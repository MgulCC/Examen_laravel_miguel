@extends('layouts.app')

@section('content')
<div class="container">
    Vista del producto
    <hr>
    Nombre: {{$product->name}} stock: {{$product->quantity}} status:{{$product->status}}
    <br>
    Descripción: {{$product->description}}
    <br>
    <a class="btn btn-primary" href="{{ url('product') }}" >volver</a>

</div>
@endsection