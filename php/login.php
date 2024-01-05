<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/content.css">
    <title>Login Form</title>
</head>
<body>
  <div class="login_block">
    <form action="process_login.php" method="post">
        <h2>Login</h2>
        <label for="account">Account:</label>
        <input type="text" id="account" name="account" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
  </div>

</body>
</html>
