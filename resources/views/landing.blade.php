<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notebook Store Landing Page</title>
  <style>
    /* Add your custom styles here */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f0f0;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .title {
      font-size: 36px;
      margin-bottom: 20px;
    }

    .button {
      display: inline-block;
      padding: 15px 30px;
      font-size: 24px;
      font-weight: bold;
      text-decoration: none;
      color: #ffffff;
      background-color: #007bff;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="title">Welcome to our Notebook Store!</h1>
    <a href="{{ route('store') }}" class="button">Shop Now</a>
  </div>
</body>
</html>
