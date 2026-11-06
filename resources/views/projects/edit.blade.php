@extends('layouts.app')

@section('content')
<h1>Edit Project</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $project->title) }}">
    </div>

    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" rows="3" class="form-control">{{ old('description', $project->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="tech_stack">Teknologi</label>
        <input type="text" id="tech_stack" name="tech_stack" class="form-control" value="{{ old('tech_stack', $project->tech_stack) }}">
    </div>

    <div class="form-group">
        <label for="category_id">Kategori</label>
        <select id="category_id" name="category_id" class="form-control">
            <option value="">Pilih kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $project->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="thumbnail">Thumbnail</label><br>
        @if ($project->thumbnail)
            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" width="150" class="mb-2"><br>
        @endif
        <input type="file" id="thumbnail" name="thumbnail" class="form-control-file" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<hr>
<h2 class="h5">Gallery</h2>

<form action="{{ route('projects.images.store', $project) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="file" name="images[]" class="form-control-file" accept="image/*" multiple>
    </div>
    <button type="submit" class="btn btn-secondary">Upload</button>
</form>

<div class="row mt-3">
    @foreach ($project->images as $image)
        <div class="col-6 col-md-3 mb-3">
            <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->caption ?: $project->title }}" class="img-fluid mb-2">
            <form method="POST" action="{{ route('projects.images.destroy', [$project, $image]) }}" onsubmit="return confirm('Hapus gambar ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </div>
    @endforeach
</div>
@endsection