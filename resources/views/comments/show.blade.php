<!-- resources/views/comments/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">Comment Details</h1>
                
                <div class="mb-3">
                    <h3>Content</h3>
                    <p>{{ $comment->content }}</p>
                </div>

                <div class="mb-3">
                    <h3>Author</h3>
                    <p>User ID: {{ $comment->user_id }}</p>
                </div>

                <div class="mb-3">
                    <h3>Post</h3>
                    <p>Post ID: {{ $comment->post_id }}</p>
                </div>

                <p class="mt-4"><a href="{{ route('comments.index') }}" class="btn btn-link">Back to all comments</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
