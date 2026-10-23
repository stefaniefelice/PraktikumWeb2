@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<h1>Blog Posts</h1>

<form action="{{ route('posts.index') }}" method="GET" class="form-inline mb-3">
    <input type="text" name="q" value="{{ request('q') }}"
           class="form-control mr-2" placeholder="Cari judul...">
    <select name="per_page" class="form-control mr-2">
        @foreach ([5, 10, 25] as $n)
            <option value="{{ $n }}"
                {{ (int) request('per_page', 10) === $n ? 'selected' : '' }}>
                {{ $n }} per halaman
            </option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Terapkan</button>
</form>

@if (count($posts) > 0)
    @foreach ($posts as $post)
        <div class="card card-body mb-3">
            <h3>{{ $posts->firstItem() + $loop->index }}.
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
            <small>Tanggal: {{ $post->created_at }}</small>
        </div>
    @endforeach

    <div class="mt-4 small text-muted">
        Halaman : {{ $posts->currentPage() }} <br>
        Jumlah Data : {{ $posts->total() }} <br>
        Data Per Halaman : {{ $posts->perPage() }}
    </div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@else
    <h3>Tidak ada data.</h3>
@endif
@endsection