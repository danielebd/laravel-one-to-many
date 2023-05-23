@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="form-input-image">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                <div class="col mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description" cols="30" rows="4"
                        >{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="{{ old('start_date') }}">
                </div>
                <div class="col-6 mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="budget" class="form-label">Budget</label>
                    <input type="number" class="form-control" id="budget" name="budget" value="{{ old('budget') }}">
                </div>
                <div class="col mb-3">
                    <label for="created_by" class="form-label">Created By</label>
                    <input type="text" class="form-control" id="created_by" name="created_by"
                        value="{{ old('created_by') }}">
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="completed" name="completed"
                    value="{{ old('completed') }}">
                <label class="form-check-label" for="completed">Completed</label>
            </div>
            <div class="mb-3">
                <div class="preview">
                    <img id="file-image-preview">
                </div>
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection
