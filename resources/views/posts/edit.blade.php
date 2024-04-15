@extends('layouts.template')
@section('title', 'Edit post')

@section('body')
  <h1 class="my-4 text-center">Edit post ✍️</h1>
  <a href="{{ route('posts.index') }}" class="btn btn-primary mb-4 ml-auto">🔙 Back</a>
  <form action="{{route('posts.update', $post)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="col-6 mt-3">
        <input type="text" class="form-control" placeholder="Title" name="title" value="{{ old('title', $post->title) }}" required>
      </div>
      <div class="col-6 mt-3">
        <input type="text" class="form-control" placeholder="Category" name="category" value="{{ old('category', $post->category) }}" required>
      </div>
      <div class="col-12 mt-3">
        <textarea class="form-control" placeholder="Text" name="text" rows="10" required>{{ old('text', $post->text) }}</textarea>
      </div>
      <div class="col-6">
        <button type="submit" name="status" value="published" class="btn btn-success mt-3">{{ $post->status == 'draft' ? 'Publish' : 'Save' }}</button>
      </div>
      <div class="col-6">
        <button type="submit" name="status" value="draft" class="btn btn-warning mt-3 ml-auto">{{ $post->status == 'draft' ? 'Continue as draft' : 'Back to draft' }}</button>
      </div>
    </div>
  </form>
@endsection

