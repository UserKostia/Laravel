<!-- resources/views/posts/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post ? $post->title : 'Post not found' }}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($post)
                    <h1 class="mb-4">{{ $post->title }}</h1>
                    <p>{{ $post->content }}</p>

                    <h2 class="mt-4">Comments</h2>
                    @forelse($post->comments as $comment)
                        <div class="mb-3">
                            <p>{{ $comment->content }}</p>
                            <small>by User {{ $comment->user_id }}</small>
                        </div>
                    @empty
                        <p>No comments yet.</p>
                    @endforelse

                    <form action="{{ route('comments.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="mb-3">
                            <label for="body" class="form-label">Add a comment:</label>
                            <textarea name="content" class="form-control" id="body" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </form>
                @else
                    <h1 class="mb-4">Post not found</h1>
                    <p class="mb-4"><a href="{{ route('posts.index') }}" class="btn btn-link">Back to all posts</a></p>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
