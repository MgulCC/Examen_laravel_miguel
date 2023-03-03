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
    <label for="title">titulo</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ isset($post->title) ? $post->title : old('title') }}">
</div>
<div class="form-group">
    <label for="status">estado</label>
    <input type="text" class="form-control" name="status" id="status" value="{{ isset($post->status) ? $post->status : old('status') }}">
</div>

    <input type="submit" class="btn btn-primary" value="{{ $modo }} post">
    <a class="btn btn-success" href="{{ url('post') }}" >volver</a>