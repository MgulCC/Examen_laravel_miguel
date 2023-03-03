@extends('layouts.app')


@section('content')
<div class="container">
    @if (Session::has('mensaje'))
        <br>
        <div class="alert alert-success">
            {{ Session::get('mensaje') }}
        </div>
    @endif
    Listado de posts
    <a href="{{ url('post/create') }}" class="btn btn-info">escribir un post</a>
    <hr>
    <table class="table data-table" id="miTabla">
        <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>status</th>
                

                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id }}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->status}}</td>
                
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ url('post/' . $post->id) }}" class="btn btn-primary">ver</a>
                        <a href="{{ url('post/' . $post->id . '/edit') }}" class="btn btn-warning">editar</a>
                        <form action="{{url('post/' . $post->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('se va a elmiminar el registro #{{ $post->id}}')" class="btn btn-danger" value="Borrar">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection

