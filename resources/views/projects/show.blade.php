   @extends('layouts.app')

   @section('content')
   <div class="jumbotron">
       <h1>{{ $project->title }}</h1>
       <small>Teknologi: {{ $project->tech_stack }}</small>
       <p>{{ $project->description }}</p>
   </div>
   @endsection