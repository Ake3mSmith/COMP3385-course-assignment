<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="description" content="NuTree Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/400004129/css/style.css">
</head>

<body>
    <header class="header-dashboard">
        <p class='logo'>NuTree Group Of Researchers</p>
        <a class="logout" href="/400004129/app/logout/logout.php">Logout</a>
    </header>
    <section class="login-details">
        <p><?php
            echo $_SESSION["role"]
            ?>: <span><?php
                        echo $_SESSION["username"]
                        ?></p></span></p>
        <p>Email: <?php
                    echo $_SESSION["email"]
                    ?></p>
    </section>


    <?php if ($_SESSION['role'] === 'Research Group Manager') : ?>
        <section class="role-actions">
            <a href="">Create Study</a>
            <a href="">View All Studies</a>
            <a href="">Delete Previous Study</a>
            <a href="/400004129/app/views/create-user.php">Create New Researchers</a>
        </section>
    <?php endif; ?>

    <?php if ($_SESSION['role'] === 'Research Study Manager') : ?>
        <section class="role-actions">
            <a href="">Create Study</a>
            <a href="">View All Studies</a>
            <a href="">Delete Previous Study</a>
        </section>
    <?php endif; ?>


    <?php if ($_SESSION['role'] === 'Researcher') : ?>
        <section class="role-actions">
            <a href="">View All Studies</a>
        </section>
    <?php endif; ?>

</body>
<footer>
    <p>Copyright &copy; "Akeem Smith". All Rights Reserved</p>
</footer>

</html>