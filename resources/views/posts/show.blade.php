@extends('layouts.template')
@section('title', 'Post')

@section('body')
  <h1 class="text-center my-4">{{ $post->title }}</h1>
  <a href="{{ route('posts.index') }}" class="btn btn-primary mb-4 ml-auto">Posts</a>
  <p style="font-size: 14px; color: lightgray;" class="mb-0">Category: {{ $categories[$post->category] }}</p>
  <p style="font-size: 14px; color: lightgray;" class="mb-0">Status: {{ $post->status }}</p>
  <p style="font-size: 14px; color: lightgray;" class="mb-0">Created at: {{ $post->created_at ? strftime("%d %b %Y", strtotime($post->created_at)) : "" }}</p>
  <p style="font-size: 14px; color: lightgray;">Update at: {{ $post->updated_at ? strftime("%d %b %Y", strtotime($post->updated_at)) : "" }}</p>

  <p>{{ $post->text }}</p>

  @include('comments.create_form')
  @include('comments.table')
@endsection
