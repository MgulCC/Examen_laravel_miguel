@extends('layouts.app')

@section('content')
<div class="container">
    editar post
    <form action="{{ url('/product/' . $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('product._fields', ['modo' => 'Editar'])

    </form>
</div>
@endsection