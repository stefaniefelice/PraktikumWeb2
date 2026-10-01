@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1>{{ $posts->title }}</h1>
    <small>Tanggal: {{ $posts->created_at }}</small>
    <p>{{ $posts->description }}</p>
    <a href="/posts/{{ $posts->id }}/edit" class="btn btn-primary">Edit</a>

    <form action="{{ route('posts.destroy', $posts->id) }}" method="POST" style="display:inline"
          onsubmit="return confirm('Yakin ingin menghapus post ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
    </form>
</div>
@endsection