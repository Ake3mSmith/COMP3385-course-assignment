<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Login</title>
    <meta name="description" content="NuTree Login">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/400004129/css/style.css">
</head>

<body>
    <header>
        <p class='logo'>NuTree Group Of Researchers</p>
    </header>
    <section class="input-container">
        <p class='form-title'>Login</p>
        <form method="post" action="../controllers/UserLoginController.php">
            <p class="error"><?php if (isset($_SESSION['loginError'])) {
                                    echo $_SESSION['loginError'];
                                    unset($_SESSION['loginError']);
                                }
                                ?></p>
            <label for="email">Enter your email:</label>
            <input type="text" name="emailinput" placeholder="Enter email"></input>

            <label for="email">Enter your password:</label>
            <input type="password" name="passwordinput" placeholder="Enter password"></input>
            <button type="submit" class="action-button">Log In</button>
        </form>
    </section>

    <footer>
        <p>Copyright &copy; "Akeem Smith". All Rights Reserved</p>
    </footer>
</body>

</html>