<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
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
        .form-container {
            background-color: #F4F4F4;
            padding: 2em;
            border-radius: 8px;
            margin-top: 1em;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #C0C78C;
            border-radius: 4px;
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
    <h1>Edit Employee</h1>
</header>
<div class="container">
    <div class="form-container">
        <form action="{{ route('employees.update', $employee['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $employee['name'] }}" required>
            <button type="submit" class="btn">Update Employee</button>
        </form>
    </div>
</div>
</body>
</html>
