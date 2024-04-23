<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="public/assets/css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="register">
    <h1>Register</h1>

    <p>Already have an account? <a href="/login">Back to Login</a></p>
    <div id="error-section">
        <?php
        if (isset($_SESSION['error'])) {
            echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']); // Clear the error message after displaying it
        }
        ?>
    </div>

    <form id="register_form" action="/register" method="POST" autocomplete="off">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <span class="error-message"></span>
        <label for="email">
            <i class="fas fa-envelope"></i>
        </label>
        <input type="email" name="email" placeholder="Email" id="email" required>
        <span class="error-message"></span>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <span class="error-message"></span>
        <label for="confirm_password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" required>
        <span class="error-message"></span>
        <input type="submit" value="Register">
    </form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="public/assets/js/script.js"></script>
</body>
</html>
