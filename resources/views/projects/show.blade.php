@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1>{{ $project->title }}</h1>
    <small>Teknologi: {{ $project->tech_stack }}</small>
    <p>{{ $project->description }}</p>

    <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary">Edit</a>

    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline"
          onsubmit="return confirm('Yakin ingin menghapus project ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
    </form>
</div>
@endsection