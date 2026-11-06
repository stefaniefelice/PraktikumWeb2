@extends('layouts.app')

@section('content')
<h1>{{ $project->title }}</h1>
<p class="text-muted">
    Kategori: {{ $project->category?->name ?? '-' }} |
    Teknologi: {{ $project->tech_stack }}
</p>
<p>{{ $project->description }}</p>

@if ($project->thumbnail)
    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="img-fluid mb-4" style="max-width:480px">
@endif

<h2 class="h5">Gallery</h2>
<div class="row">
    @forelse ($project->images as $img)
        <div class="col-6 col-md-3 mb-3">
            <figure class="mb-0">
                <img src="{{ asset('storage/' . $img->image) }}" alt="{{ $img->caption ?: $project->title }}" class="img-fluid">
                @if ($img->caption)
                    <figcaption class="small text-muted">{{ $img->caption }}</figcaption>
                @endif
            </figure>
        </div>
    @empty
        <p class="col-12">Belum ada gambar gallery.</p>
    @endforelse
</div>

<p><a href="{{ route('portfolio.index') }}">Kembali ke Portfolio</a></p>
@endsection