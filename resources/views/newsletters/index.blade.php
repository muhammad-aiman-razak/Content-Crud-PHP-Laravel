<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Index</title>
</head>
<body>
    <h1>Newsletters</h1>
    @foreach($newsletters as $newsletter)
        <div class="newsletter" data-id="{{ $newsletter->id }}">
            <h2>{{$newsletter->title}}</h2>
            <p>{{$newsletter->content}}</p>
        </div>
    @endforeach
</body>
</html>