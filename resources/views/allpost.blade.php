@extends('layouts.app')

@section('content')
<div class="container">
   
    Listado de posts
  
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id }}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->status}}</td>
                
                <td>
                   
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection


