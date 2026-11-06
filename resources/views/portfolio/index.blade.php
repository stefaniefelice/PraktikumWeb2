@extends('layouts.app')

@section('content')
<h1 class="mb-4">Portfolio</h1>

<div class="row">
    @forelse ($projects as $project)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if ($project->thumbnail)
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="card-img-top">
                @endif
                <div class="card-body">
                    <h2 class="h5"><a href="{{ route('portfolio.show', $project) }}">{{ $project->title }}</a></h2>
                    <p class="small text-muted mb-1">{{ $project->category?->name ?? '-' }}</p>
                    <p class="small mb-0">Teknologi: {{ $project->tech_stack }}</p>
                </div>
            </div>
        </div>
    @empty
        <p>Belum ada project.</p>
    @endforelse
</div>
@endsection