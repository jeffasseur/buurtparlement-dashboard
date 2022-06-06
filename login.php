<?php
include_once('bootstrap.php');
$title = "Login";

if (!empty($_POST)) {
   
    try {
        $user = new User();
        $email = $_POST['email'];
        $password = $_POST['password'];   

        if ($user->canLogin($email, $password)) {
            session_start();
            $user = $user->getByEmail($email);
            $_SESSION['user'] = $user;
            header("Location: account.php");
        } else {
            return $error = "Uw email of wachtwoord is incorrect.";
        }
    } catch (Throwable $e) {
        $error = $e->getMessage();
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtparlement | log in</title>

    <?php include_once('inc/head.inc.php'); ?>
</head>

<body>
    <?php include_once('inc/aside.inc.php'); ?>

    <div class="ownContainer">
        <?php include_once('inc/header.inc.php'); ?>
        
        <main class="login">
            <div class="account__login">
                <h5>Log in</h5>
        
                <?php if (isset($error) && !empty($error)): ?>
                    <p class="error alert-danger"> <?php echo $error; ?> </p>
                <?php endif; ?>
                
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Wachtwoord</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Log in</button>
                    </div>
                </form>
            </div>
        
            <div class="home">
                <a href="index.php" class="btn">
                    <i class="bx bx-chevron-left"></i>
                    Go back home
                </a>
                <a href="register.php" class="btn btn-outline-primary">Registreer</a>
            </div>
        </main>
    </div>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>