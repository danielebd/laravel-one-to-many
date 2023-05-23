@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="pt-5">
            {{ $project->title }}
        </h2>
        <div class="fs-5">Description: {{ $project->description }}</div>
        <div class="fs-5">Start Date: {{ $project->start_date }}</div>
        <div class="fs-5">Completed: {{ $project->completed == 1 ? 'yes' : 'no' }}</div>
        <div class="fs-5">Creared By: {{ $project->created_by }}</div>
        <div class="fs-5">Budget: {{ $project->budget }}</div>
        <div class="fs-5">Type: {{ $project->type?->name ?: 'Nessuna Categoria' }}</div>
        @if ($project->image)
            <div class="fs-5">image: </div>
            <img src="{{ asset('storage/' . $project->image) }}" alt="">
        @endif
        <div class="my-3">
            <a href="" class="btn btn-sm btn-warning">Edit</a>
            <a href="" class="btn btn-sm btn-danger">Delete</a>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-primary">Home</a>
        </div>

    </div>
@endsection
