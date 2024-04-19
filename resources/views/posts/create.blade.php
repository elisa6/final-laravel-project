@extends('layouts.template')
@section('title', 'Create post')

@section('body')
    <h1 class="my-4 text-center">Create post 📝</h1>
    <a href="{{ route('posts.index') }}" class="btn btn-primary mb-4 ml-auto">🔙 Back</a>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6 mt-3">
                <input type="text" class="form-control" placeholder="Title" name="title" required>
            </div>
            <div class="col-6 mt-3">
                <select class="form-select w-100" aria-label="Select category" name="category" required>
                    @foreach ($categories as $key => $value)
                        <option value="{{ $key }}">
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-3">
                <textarea class="form-control" placeholder="Text" name="text" rows="10" required></textarea>
            </div>
            <div class="col-6">
                <button type="submit" name="status" value="published" class="btn btn-success mt-3">Publish</button>
            </div>
            <div class="col-6">
                <button type="submit" name="status" value="draft" class="btn btn-warning mt-3 ml-auto">Save as
                    draft</button>
            </div>
        </div>
    </form>
@endsection
