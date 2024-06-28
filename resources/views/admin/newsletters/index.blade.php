<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Newsletters</title>
</head>
<body>
    <h1>Newsletters</h1>
    <a href="{{ route('admin.newsletters.create') }}">Create Newsletter</a>
    @foreach($newsletters as $newsletter)
        @if (!$newsletter->deleted)
            <div>
                <h2>{{ $newsletter->title }}</h2>
                <p>{{ $newsletter->content }}</p>
                <a href="{{ route('admin.newsletters.edit', $newsletter->id) }}">Edit</a>
                <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @else
            <div>
                <h2>{{ $newsletter->title }} (Deleted)</h2>
                <form action="{{ route('admin.newsletters.restore', $newsletter->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit">Restore</button>
                </form>
            </div>
        @endif
    @endforeach
</body>
</html>