@extends('layouts.app')

@section('content')
<h1 class="mb-4">Dashboard</h1>

<div class="row">
    <div class="col-6 col-md-3 mb-3"><x-stat-card label="Projects" :value="$totalProjects" /></div>
    <div class="col-6 col-md-3 mb-3"><x-stat-card label="Categories" :value="$totalCategories" color="text-success" /></div>
    <div class="col-6 col-md-3 mb-3"><x-stat-card label="Technologies" :value="$totalTechnologies" color="text-info" /></div>
    <div class="col-6 col-md-3 mb-3"><x-stat-card label="Skills" :value="$totalSkills" color="text-warning" /></div>
</div>

<div class="row">
    <div class="col-6 col-md-3 mb-3"><x-stat-card label="Published" :value="$publishedProjects" color="text-success" /></div>
    <div class="col-6 col-md-3 mb-3"><x-stat-card label="Draft" :value="$draftProjects" color="text-secondary" /></div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <h2 class="h5">Skill Teratas</h2>
        <ol>
            @foreach ($topSkills as $skill)
                <li>{{ $skill->name }} ({{ $skill->level }}%)</li>
            @endforeach
        </ol>
        @if (Route::has('skills.index'))
            <a href="{{ route('skills.index') }}">Kelola Skill</a>
        @endif
    </div>
    <div class="col-md-6">
        <h2 class="h5">Project per Kategori</h2>
        <ul>
            @foreach ($categories as $category)
                <li>{{ $category->name }}: {{ $category->projects_count }} project</li>
            @endforeach
        </ul>
    </div>
</div>

<h2 class="h5 mt-4">Project Terbaru</h2>
<table class="table">
    <thead>
        <tr><th>Judul</th><th>Kategori</th><th>Dibuat</th></tr>
    </thead>
    <tbody>
        @forelse ($latestProjects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>{{ $project->category?->name ?? '-' }}</td>
                <td>{{ $project->created_at?->format('d M Y') }}</td>
            </tr>
        @empty
            <tr><td colspan="3">Belum ada project.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection