@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="pt-5">
            Types List
        </h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <a class="btn  btn-primary my-3" href="{{ route('admin.types.create') }}">Create</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td scope="row">{{ $type->name }}</th>
                        <td scope="row">{{ $type->slug }}</th>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.types.show', $type->slug) }}"
                                class="btn btn-sm btn-primary">Show</a>
                            <a href="{{ route('admin.types.edit', $type->slug) }}"
                                class="btn btn-sm btn-warning mx-3">Edit</a>
                            <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#type-{{$type->id}}">Delete</a>
                        </td>

                    </tr>
                    <div class="modal fade" id="type-{{ $type->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sei sicuro di voler cancellare
                                        {{ $type->name }}?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
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
