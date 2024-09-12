<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .container1 {
            display: flex;
            height: 100%;
        }

        .sidebar {
            flex: 0 0 250px;
            color: #fff;
            background-color: #f1f1f1;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
        }
        .sidebar ul li a {
            color: #333;
            text-decoration: none;
        }
        .sidebar ul li a:hover {
            background-color: #ddd;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
    </style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container1">
        <nav class="sidebar">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Category</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>