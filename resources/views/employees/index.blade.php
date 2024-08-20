<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #C0C78C;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #A6B37D;
            color: #FEFAE0;
            cursor: pointer; /* Add cursor pointer to indicate sortable */
        }
        tr:nth-child(even) {
            background-color: #F4F4F4;
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
    <h1>Employee List</h1>
</header>
<div class="container">
    <a href="{{ route('employees.create') }}" class="btn">Add New Employee</a>
    <table id="employeeTable">
        <thead>
            <tr>
                <th id="idHeader">ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee['id'] }}</td>
                <td>{{ $employee['name'] }}</td>
                <td>
                    <a href="{{ route('employees.show', $employee['id']) }}" class="btn">View</a>
                    <form action="{{ route('employees.destroy', $employee['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.getElementById('employeeTable');
        const rows = Array.from(table.querySelectorAll('tbody tr'));

        // Function to sort table
        function sortTable(index, ascending) {
            rows.sort((rowA, rowB) => {
                const cellA = rowA.children[index].innerText;
                const cellB = rowB.children[index].innerText;

                if (ascending) {
                    return parseInt(cellA) - parseInt(cellB);
                } else {
                    return parseInt(cellB) - parseInt(cellA);
                }
            });

            rows.forEach(row => table.querySelector('tbody').appendChild(row));
        }

        // Add click event listener to the ID header
        document.getElementById('idHeader').addEventListener('click', () => {
            const currentOrder = document.getElementById('idHeader').dataset.order || 'asc';
            const newOrder = currentOrder === 'asc' ? 'desc' : 'asc';
            document.getElementById('idHeader').dataset.order = newOrder;
            sortTable(0, newOrder === 'asc');
        });
    });
</script>
</body>
</html>
