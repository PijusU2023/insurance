<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car & Owner System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Car Management</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('owners.index') }}">Owners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cars.index') }}">Cars</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
