<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">List of Posts</h1>

                <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create a New Post</a>

                @if($posts->isEmpty())
                    <div class="alert alert-info">No posts available.</div>
                @else
                    <ul class="list-group">
                        @foreach($posts as $post)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                                
                                <div>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
