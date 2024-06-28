<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Newsletters</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Newsletters</h1>
        <a href="{{ route('admin.newsletters.create') }}" class="btn btn-success mb-3">Create Newsletter</a>
        @foreach($newsletters as $newsletter)
            <div class="card mb-3">
                <div class="card-body">
                    @if (!$newsletter->deleted)
                        <h5 class="card-title">{{ $newsletter->title }}</h5>
                        <p class="card-text">{{ $newsletter->content }}</p>
                        <a href="{{ route('admin.newsletters.edit', $newsletter->id) }}" class="btn btn-primary">Edit</a>
                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#deleteModal{{ $newsletter->id }}">
                            Delete
                        </button>
                    @else
                        <h5 class="card-title">{{ $newsletter->title }} (Deleted)</h5>
                        <form action="{{ route('admin.newsletters.restore', $newsletter->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Restore</button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Delete Pop Up Modal -->
            <div class="modal fade" id="deleteModal{{ $newsletter->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete "{{ $newsletter->title }}"?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>