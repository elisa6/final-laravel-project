@extends('layouts.template')
@section('title', 'Comment')

@section('body')
  <a href="{{ route('posts.show', $post) }}" class="btn btn-primary mb-4 ml-auto">Go to the post</a>
  <a href="{{ route('comments.index', $post) }}" class="btn btn-primary mb-4 ml-auto">Show all comments</a>
  <p style="font-size: 14px; color: lightgray;" class="mb-0">Created at: {{ $comment->created_at ? strftime("%d %b %Y", strtotime($comment->created_at)) : "" }}</p>
  <p style="font-size: 14px; color: lightgray;">Update at: {{ $comment->updated_at ? strftime("%d %b %Y", strtotime($comment->updated_at)) : "" }}</p>

  <p>{{ $comment->text }}</p>
@endsection
