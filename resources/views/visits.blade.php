<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visits Dashboard</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Visits Dashboard</h1>
        <table id="visitsTable" class="display">
            <thead>
                <tr>
                    <th>User Agent</th>
                    <th>IP Address</th>
                    <th>Referer</th>
                    <th>Request Method</th>
                    <th>Request URI</th>
                    <th>Query String</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visits as $visit)
                    <tr>
                        <td>{{ $visit->user_agent }}</td>
                        <td>{{ $visit->ip_address }}</td>
                        <td>{{ $visit->referer }}</td>
                        <td>{{ $visit->request_method }}</td>
                        <td>{{ $visit->request_uri }}</td>
                        <td>{{ $visit->query_string }}</td>
                        <td>{{ $visit->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#visitsTable').DataTable();
        });
    </script>
</body>
</html>
