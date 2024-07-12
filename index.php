<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/regempleado.css">
</head>
<body>
        <form class="form-container" action="php/login.php" method="post">
        <h2>Login</h2>
    
        <p class="form-group"">
            <label for="username">Username:</label>
            <input type="text" class="menu-button" id="username" name="username" required>
        </p>
        <p class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="menu-button" id="password" name="password" required></p>
        
        <button class="btnlogin" type="submit">Login</button>
    </form>
    
</body>
</html>