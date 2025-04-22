<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Sign up for MuscleMap and create your personalized workout plan.">
        <meta name="author" content="Andy Phan, Kevin Arleen">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MuscleMap - Signup</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"  crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body class="auth-page">
        <div class="auth-container">
            <h1>MuscleMap</h1>
            <h3>Create a New Account</h3>

            <?php if (!empty($_SESSION["error"])): ?>
            <div class="alert alert-danger">
                <?=$_SESSION["error"]?>
                <?php unset($_SESSION["error"]); ?>
            </div>
            <?php endif; ?>

            <form id="signupForm" action="" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Choose a username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" required>
                    <small>Password must be at least 8 characters, including
                        one uppercase letter, one lowercase letter, one number, and one special character.</small>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn">Sign Up</button>
            </form>
            <p>Already have an account? <a href="index.php?command=login">Login Here</a></p>
        </div>
        <script src="/tmq6ed/musclemap/assets/js/signup.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>