@extends('layouts.app')

@section('content')
<h1>Edit Skill</h1>

<form action="{{ route('skills.update', $skill) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $skill->name) }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="level">Level (0-100)</label>
        <input type="number" id="level" name="level" class="form-control" value="{{ old('level', $skill->level) }}">
        @error('level')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('skills.index') }}" class="btn btn-link">Batal</a>
</form>
@endsection