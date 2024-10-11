<!-- resources/views/comments/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Comment</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">Create a New Comment</h1>

                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="post_id" class="form-label">Post:</label>
                        <select class="form-control" name="post_id" id="post_id" required>
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content:</label>
                        <textarea name="content" class="form-control" id="content" rows="6" required>{{ old('content') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Comment</button>
                </form>

                <p class="mt-4"><a href="{{ route('comments.index') }}" class="btn btn-link">Back to all comments</a></p>

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
