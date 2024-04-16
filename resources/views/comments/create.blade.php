@extends('layouts.template')
@section('title', 'Create comment')

@section('body')
<h3 class="my-4 text-center">{{$post->title}} 📝</h3>
<a href="{{ route('posts.show', $post) }}" class="btn btn-primary mb-4 ml-auto">Go to the post</a>
@include('comments.create_form')
@endsection
