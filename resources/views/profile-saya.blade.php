@extends('layouts.app')

@section('content')
<h1>Profile Saya</h1>
<p>Nama : {{ Auth::user()->name }}</p>
<p>Email : {{ Auth::user()->email }}</p>
@endsection