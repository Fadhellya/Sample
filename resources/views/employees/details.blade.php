<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Employee Details</h1>
    <div>
        <p>ID: {{ $employee['id'] }}</p>
        <p>Name: {{ $employee['name'] }}</p>
    </div>
</body>
</html>
