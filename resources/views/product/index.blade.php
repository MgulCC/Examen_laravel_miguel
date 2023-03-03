@extends('layouts.app')

@section('scripts')
<link href="https:////cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https:////ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https:////cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https:////cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>

@endsection

@section('content')
<div class="container">
    @if (Session::has('mensaje'))
        <br>
        <div class="alert alert-success">
            {{ Session::get('mensaje') }}
        </div>
    @endif
    Listado de productos
    <a href="{{ url('product/create') }}" class="btn btn-info">escribir un producto</a>
    <hr>
    <table class="table data-table" id="miTabla">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>description</th>
                <th>quantity</th>
                <th>status</th>
                

                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->status}}</td>
                
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ url('product/' . $product->id) }}" class="btn btn-primary">ver</a>
                        <a href="{{ url('product/' . $product->id . '/edit') }}" class="btn btn-warning">editar</a>
                        <form action="{{url('product/' . $product->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('se va a elmiminar el registro #{{ $product->id}}')" class="btn btn-danger" value="Borrar">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    {!! $products->links() !!}
</div>
@endsection


@section('datatable')
<script>
    $(document).ready(function(){
        $('.data-table').DataTable({

        });
    });
</script>
@endsection