<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Show Newsletter</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $newsletter->title }}</h1>
        <p>{{ $newsletter->content }}</p>
        <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Newsletter</button>
        </form>
        <a href="{{ route('admin.newsletters.index') }}" class="btn btn-secondary">Back to Newsletters</a>
    </div>
</body>
</html>