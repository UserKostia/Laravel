<form action="{{ route('comments.store', $post) }}" method="POST">
    @csrf
    <textarea name="body" required></textarea>
    <button type="submit">Додати коментар</button>
</form>
