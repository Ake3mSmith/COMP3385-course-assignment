<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create New User</title>
    <meta name="description" content="Create users">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/400004129/css/style.css" />
</head>

<body>
    <header class="header-dashboard">
        <p class='logo'>NuTree Group Of Researchers</p>
        <a class="logout" href="/400004129/app/logout/logout.php">Logout</a>
    </header>

    <section class="input-container">
        <p class='form-title'>Create a User</p>
        <form method="post" action="../controllers/CreateUserController.php">
            <p class="error"><?php if (isset($_SESSION['createUserError'])) {
                                    echo $_SESSION['createUserError'];
                                    unset($_SESSION['createUserError']);
                                }
                                ?></p>
            <label for="username">Username</label>
            <input type="text" name="createUserName" placeholder="Enter username"></input>

            <label for="email">Email</label>
            <input type="text" name="createEmail" placeholder="Enter email"></input>

            <label for="password">Password</label>
            <input type="password" name="createPassword" placeholder="Enter password"></input>

            <label for="role">Role</label>
            <select name="roles" id="roles">
                <option value="Research Study Manager">Research Study Manager</option>
                <option value="Researcher">Researcher</option>
            </select>
            <button type="submit" class="action-button">Create User</button>
        </form>
    </section>

    <footer>
        <p>Copyright &copy; "Akeem Smith". All Rights Reserved</p>
    </footer>
</body>

</html>