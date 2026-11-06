@extends('layouts.app')

@section('content')
<h1>Kelola Skill</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr><th>Nama</th><th>Level</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @foreach ($skills as $skill)
            <tr>
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->level }}%</td>
                <td><a href="{{ route('skills.edit', $skill) }}">Edit</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('admin.dashboard') }}">Kembali ke Dashboard</a>
@endsection