   @extends('layouts.app')

   @section('content')
   <div class="jumbotron">
       <h1>{{ $posts->title }}</h1>
       <small>Tanggal: {{ $posts->created_at }}</small>
       <p>{{ $posts->description }}</p>
   </div>
   @endsection