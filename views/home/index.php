<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/public/css/styles.css">

    <style>
        /* Additional styling */
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555;
            line-height: 1.5;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome to the Registration System</h1>
    <p>This is a registration system where users can sign up for accounts and access various features.</p>
    <p>Some features of the system include:</p>
    <ul>
        <li>User registration</li>
        <li>User login</li>
        <li>Access to a user dashboard</li>
    </ul>
    <p>To get started, you can:</p>
    <ul>
        <li><a href="/register">Register</a></li>
        <li><a href="/login">Login</a></li>
    </ul>
</div>
</body>
</html>
