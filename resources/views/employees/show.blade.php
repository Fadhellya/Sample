<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FEFAE0;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        header {
            background-color: #B99470;
            padding: 1em;
            color: #FEFAE0;
            text-align: center;
        }
        .employee-details {
            background-color: #F4F4F4;
            padding: 2em;
            border-radius: 8px;
            margin-top: 1em;
        }
        .btn {
            background-color: #A6B37D;
            color: #FEFAE0;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: #C0C78C;
        }
    </style>
</head>
<body>
<header>
    <h1>Employee Details</h1>
</header>
<div class="container">
    <div class="employee-details">
        <p><strong>ID:</strong> {{ $employee['id'] }}</p>
        <p><strong>Name:</strong> {{ $employee['name'] }}</p>
        <a href="{{ route('employees.index') }}" class="btn">Back to List</a>
        <a href="{{ route('employees.edit', $employee['id']) }}" class="btn">Edit</a>
        <form action="{{ route('employees.destroy', $employee['id']) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
</div>
</body>
</html>
