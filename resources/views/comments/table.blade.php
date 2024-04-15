<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Text</th>
            <th scope="col">Post</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
            <tr>
                <th scope="row">{{ $comment->text }}</th>
                <th><a href="{{ route('posts.show', $comment->post) }}">{{ $comment->post->title }}</a></th>
                <td>{{ $comment->created_at ? $comment->created_at->format('d-m-Y') : '' }}</td>
                <td>{{ $comment->updated_at ? $comment->updated_at->format('d-m-Y') : '' }}</td>
                <td class="d-flex"><a
                        href="{{ route('comments.edit', ['post' => $comment->post, 'comment' => $comment]) }}"
                        class="btn btn-success mx-1">Edit</a><a
                        href="{{ route('comments.show', ['post' => $comment->post, 'comment' => $comment]) }}"
                        class="btn btn-success mx-1">Show</a>
                    <form method="POST" action="{{ route('comments.destroy', ['post' => $comment->post, 'comment' => $comment]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
