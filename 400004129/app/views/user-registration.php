<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Registration</title>
    <meta name="description" content="Register here">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/400004129/css/style.css" />
</head>
<style>

</style>

<body>
    <header>
        <p class='logo'>NuTree Group Of Researchers</p>
    </header>
    <section class="input-container">
        <p class='form-title'>Register A User</p>
        <form method="post" action="../controllers/UserRegistrationController.php">
            <p class="error"><?php if (isset($_SESSION['registrationError'])) {
                                    echo $_SESSION['registrationError'];
                                    unset($_SESSION['registrationError']);
                                }
                                ?></p>
            <label for="username">Enter username:</label>
            <input type="text" name="registerUserName" placeholder="Enter username"></input>

            <label for="email">Enter email:</label>
            <input type="text" name="registerEmail" placeholder="Enter email"></input>

            <label for="password">Enter password:</label>
            <input type="password" name="registerPassword" placeholder="Enter password"></input>
            <button type="submit" class="action-button">Register</button>
        </form>
    </section>

    <footer>
        <p>Copyright &copy; "Akeem Smith". All Rights Reserved</p>
    </footer>
</body>

</html>