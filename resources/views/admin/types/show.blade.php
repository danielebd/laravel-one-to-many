@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="pt-5">
            {{ $type->name }}
        </h2>
        Lista Projects:
        <hr>
        <ul>
            @foreach ($type->projects as $project)
                <li><a href="{{route('admin.projects.show', $project)}}">{{ $project->title }}</a></li>
            @endforeach
        </ul>


        <div class="my-3">
            <a href="" class="btn btn-sm btn-warning">Edit</a>
            <a href="" class="btn btn-sm btn-danger">Delete</a>
            <a href="{{ route('admin.types.index') }}" class="btn btn-sm btn-primary">Home</a>
        </div>

    </div>
@endsection
