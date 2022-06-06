<?php
include_once('bootstrap.php');

if (!empty($_POST)) {
    try {
        $user = new User();
        // fill in values from form
        $user->setFirstName($_POST['firstname']);
        $user->setLastName($_POST['lastname']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
    
        $user->register();
    
        session_start();
        $_SESSION['user'] = $user;
        header('Location: account.php');
    } catch (Throwable $e) {
        echo $e->getMessage();
    }    
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtparlement | Registreer</title>

    <?php include_once('inc/head.inc.php'); ?>
</head>
<body class="login">
    <div class="account__login">
        <h5 class="">Registreer</h5>
        <form action="" method="POST">
            <div class="firstLastName mb-3 d-flex">
                <div>
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="firstname" name="firstname" id="firstname" class="form-control">
                </div>
                <div>
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="lastname" name="lastname" id="lastname" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Wachtwoord</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Registreer</button>
            </div>
        </form>
    </div>

    <div class="home">
        <a href="index.php" class="btn">
            <i class="bx bx-chevron-left fs-6"></i>
            Go back home
        </a>
        <a href="login.php" class="btn btn-outline-primary">Log in</a>
    </div>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>