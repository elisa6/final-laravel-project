@extends('layouts.template')
@section('title', 'Posts')

@section('body')
    <h1 class="text-center my-4">
        Posts 🗄️</h1>
    @guest
    @else
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-4 ml-auto">New post</a>
    @endguest
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">
                    @guest
                        Author
                    @else
                        Actions
                    @endguest
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></th>
                    <td>{{ $categories[$post->category] }}</td>
                    <td class="text-capitalize">{{ $post->status }}</td>
                    <td>{{ $post->created_at ? $post->created_at->format('d-m-Y') : '' }}</td>
                    <td>{{ $post->updated_at ? $post->updated_at->format('d-m-Y') : '' }}</td>
                    @guest
                        <td>{{ $post->user->name }} </td>
                    @else
                        <td class="d-flex"><a href="{{ route('posts.edit', $post) }}" class="btn btn-success mx-1">Edit</a>
                            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('comments.index', $post) }}" class="btn btn-primary mx-1">Comments</a>
                        </td>
                    @endguest
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
