@extends('layouts.template')
@section('title', 'Edit comment')

@section('body')
  <h1 class="my-4 text-center">Edit comment ✍️</h1>
  <a href="{{ route('comments.index', $post) }}" class="btn btn-primary mb-4 ml-auto">🔙 Back</a>
  <form action="{{route('comments.update', ['post' => $comment->post, 'comment' => $comment])}}" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="col-12 mt-3">
        <textarea class="form-control" placeholder="Text" name="text" rows="10" required>{{ old('text', $comment->text) }}</textarea>
      </div>
      <div class="col-6">
        <button type="submit" name="status" value="draft" class="btn btn-warning mt-3">Save</button>
      </div>
    </div>
  </form>
@endsection

