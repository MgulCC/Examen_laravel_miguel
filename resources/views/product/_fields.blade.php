@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="title">name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ isset($post->name) ? $post->name : old('name') }}">
</div>
<div class="form-group">
    <label for="description">estado</label>
    <input type="text" class="form-control" name="description" id="description" value="{{ isset($post->description) ? $post->description : old('description') }}">
</div>
<div class="form-group">
    <label for="quantity">estado</label>
    <input type="number" class="form-control" name="quantity" id="quantity" value="{{ isset($post->quantity) ? $post->quantity : old('quantity') }}">
</div>
<div class="form-group">
    <label for="status">estado</label>
    <input type="number" class="form-control" name="status" id="status" value="{{ isset($post->status) ? $post->status : old('status') }}">
</div>

<input type="submit" class="btn btn-primary" value="{{ $modo }} product">
<a class="btn btn-success" href="{{ url('product') }}" >volver</a>