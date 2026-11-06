@extends('layouts.app')

@section('content')
<h1>Kelola Project</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<p>
    <a href="{{ route('projects.create') }}">+ Tambah Project</a> |
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
</p>

<table class="table">
    <thead>
        <tr>
            <th>Thumbnail</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($projects as $project)
            <tr>
                <td>
                    @if ($project->thumbnail)
                        <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" width="80">
                    @endif
                </td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->category?->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('portfolio.show', $project) }}">Lihat</a> |
                    <a href="{{ route('projects.edit', $project) }}">Edit</a> |
                    <form method="POST" action="{{ route('projects.destroy', $project) }}" style="display:inline" onsubmit="return confirm('Hapus project ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link p-0">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada project.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection