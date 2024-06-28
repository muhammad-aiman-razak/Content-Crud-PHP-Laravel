<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Show Newsletter</title>
</head>
<body>
    <h1>{{ $newsletter->title }}</h1>
    <p>{{ $newsletter->content }}</p>
    <a href="{{ route('admin.newsletters.edit', $newsletter->id) }}">Edit</a>
    <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>
</html>