<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Index</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Public Newsletters</h1>
        <br>
        <div class="row">
            @foreach($newsletters as $newsletter)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $newsletter->title }}</h5>
                            <p class="card-text">{{ $newsletter->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        setInterval(function() {
            fetch('/newsletters')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('.row').innerHTML = data.map(newsletter => `
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">${newsletter.title}</h5>
                                    <p class="card-text">${newsletter.content}</p>
                                </div>
                            </div>
                        </div>
                    `).join('');
                });
        }, 5000);
    </script>
</body>
</html>