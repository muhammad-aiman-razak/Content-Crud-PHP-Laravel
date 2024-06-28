<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Edit Newsletter</title>
</head>
<body>
    <h1>Edit Newsletter</h1>
    <form action="{{ route('admin.newsletters.update', $newsletter->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $newsletter->title }}" required>
        <br>
        <label for="content">Content:</label>
        <textarea name="content" id="content" required>{{ $newsletter->content }}</textarea>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>