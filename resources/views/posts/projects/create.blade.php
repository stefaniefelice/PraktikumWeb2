@extends('layouts.app')

@section('content')
<h1>Tambah Project</h1>

<form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="tech_stack">Teknologi</label>
        <input type="text" id="tech_stack" name="tech_stack" class="form-control" placeholder="Laravel, MySQL, Bootstrap" value="{{ old('tech_stack') }}">
        @error('tech_stack')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="category_id">Kategori</label>
        <select id="category_id" name="category_id" class="form-control">
            <option value="">Pilih kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select id="status" name="status" class="form-control">
            <option value="published" @selected(old('status', 'published') === 'published')>Published</option>
            <option value="draft" @selected(old('status') === 'draft')>Draft</option>
        </select>
        @error('status')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="thumbnail">Thumbnail</label>
        <input type="file" id="thumbnail" name="thumbnail" class="form-control-file" accept="image/*">
        @error('thumbnail')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection