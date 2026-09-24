   @extends('layouts.app')

   @section('content')
   <div class="jumbotron">
       <h1>Add Blog Post</h1>
       <form action="{{ route('posts.store') }}" method="POST">
           @csrf
           <div class="form-group">
               <label for="title">Title</label>
               <input type="text" class="form-control" id="title" name="title">
           </div>
           <div class="form-group">
               <label for="description">Description</label>
               <textarea class="form-control" id="description" rows="5" name="description"></textarea>
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
       </form>
   </div>
   @endsection