@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="pt-5">
            Projects List
        </h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <a class="btn  btn-primary my-3" href="{{ route('admin.projects.create') }}">Create</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Star Date</th>
                    <th scope="col">Completed</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->title }}</th>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->description }}</td>
                        <td>@if ($project->image) img
                        @endif </td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->completed == 1 ? 'yes' : 'no' }}</td>                        <td>{{ $project->start_date }}</td>
                        <td>{{ optional($project->type)->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.projects.show', $project->slug) }}"
                                class="btn btn-sm btn-primary">Show</a>
                            <a href="{{ route('admin.projects.edit', $project->slug) }}"
                                class="btn btn-sm btn-warning mx-3">Edit</a>
                            <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#project-{{$project->id}}">Delete</a>
                        </td>

                    </tr>
                    <div class="modal fade" id="project-{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Sei sicuro di voler cancellare {{$project->title}}?</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
