<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">{{ $post->title }}</h1>
                <p>{{ $post->content }}</p>

                <h2 class="mb-4">Comments</h2>
                @foreach($post->comments as $comment)
                    <div class="mb-3">
                        <p>{{ $comment->content }}</p>
                        <small>by User {{ $comment->user_id }}</small>
                    </div>
                @endforeach

                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="body" class="form-label">Add a comment:</label>
                        <textarea name="body" class="form-control" id="body" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
