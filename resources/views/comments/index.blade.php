@extends('layouts.template')
@section('title', 'Comments')

@section('body')
  <h1 class="text-center my-4">{{ $post->title }} Comments 🗄️</h1>
  <a href="{{ route('posts.show', $post) }}" class="btn btn-primary mb-4 ml-auto">Go to the post</a>
  <a href="{{ route('comments.create', $post) }}" class="btn btn-primary mb-4 ml-auto">New comment</a>
  @include('comments.table')
@endsection
