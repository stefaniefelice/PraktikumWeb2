@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{ $project->title ?? old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="5" name="description"
                      required>{{ $project->description ?? old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="tech_stack">Tech Stack</label>
            <input type="text" class="form-control" id="tech_stack" name="tech_stack"
                   value="{{ $project->tech_stack ?? old('tech_stack') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection