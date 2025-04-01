<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Log in to MuscleMap to save and track your workout progress.">
        <meta name="author" content="Andy Phan, Kevin Arleen">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MuscleMap - Login</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body class="auth-page">
        <div class="auth-container">
            <h1>MuscleMap</h1>
            <h3>Enter your login credentials</h3>

            <form action="" method="post">
                <div class="form-group">
                    <label for="first">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <p>Don't have an account? <a href="index.php?command=signup">Sign up here</a>
            </p>
        </div>
    </body>
</html>