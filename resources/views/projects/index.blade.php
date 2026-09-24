   @extends('layouts.app')

   @section('content')
   <h1>Daftar Project</h1>
   @forelse ($projects as $project)
       <div class="well">
           <h3><a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a></h3>
           <small>Teknologi: {{ $project->tech_stack }}</small>
       </div>
   @empty
       <p>Belum ada data project.</p>
   @endforelse
   @endsection