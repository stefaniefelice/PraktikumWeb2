   @extends('layouts.app')

   @section('content')
   <div class="jumbotron">
       <h1>Add Blog Post</h1>
          <form action="{{ route('posts.update', $post->id) }}" method="POST">
       @csrf
       @method('PUT')
       <div class="form-group">
           <label for="title">Title</label>
           <input type="text" class="form-control" id="title" name="title"
                  value="{{ $post->title ?? old('title') }}" required>
       </div>
       <div class="form-group">
           <label for="description">Description</label>
           <textarea class="form-control" id="description" rows="5" name="description"
                     required>{{ $post->description ?? old('description') }}</textarea>
       </div>
       <button type="submit" class="btn btn-primary">Submit</button>
   </form>
   </div>
   @endsection