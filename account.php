<?php
include_once('bootstrap.php');
    $account = true;
    $title = "Account";

    session_start();

    if(!isset($_SESSION['user'])) {
        header("Location: login.php");
    } else {
        $user = User::getUser($_SESSION['user']['id']);
    }

    if(!empty($_POST)) {
        $user = new User();
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setBackupEmail($_POST['backupEmail']);
        $user->setBio($_POST['bio']);

        $user->update($_SESSION['user']['id']);

        header("Location: account.php");
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtparlement | Account</title>

    <?php include_once('inc/head.inc.php'); ?>
</head>
<body>
    <?php include_once('inc/aside.inc.php'); ?>

    <div class="ownContainer">
        <?php include_once('inc/header.inc.php'); ?>

        <main class="account">
            <div>
                <div class="account__box">
                    <img src="<?php echo htmlspecialchars($user['profile_img']); ?>" alt="Profiel Foto" height="180" width="180" class="account__box__img rounded-circle" style="object-fit: cover;">
                    <h2 class="text-center"><?php echo htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']); ?></h2>
                    <button class="btn btn-primary">Kies een nieuwe profielfoto</button>
                </div>
            </div>

            <div class="account__info">
                <h5>Algemene Informatie</h5>
                <form action="" method="POST">
                    <div class="form__firstname">
                        <label for="firstname" class="form-label">Voornaam</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo htmlspecialchars($user['firstname']); ?>">
                    </div>
                    <div class="form__lastname">
                        <label for="lastname" class="form-label">Achternaam</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo htmlspecialchars($user['lastname']); ?>">
                    </div>
                    <div class="form__email">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
                    </div>
                    <div class="form__backupEmail">
                        <label for="backupEmail" class="form-label">Tweede email</label>
                        <input type="email" class="form-control" id="backupEmail" name="backupEmail" value="<?php echo htmlspecialchars($user['backup_email']); ?>">
                    </div>
                    <div class="form__function">
                        <label for="function" class="form-label">Functie binnen het Buurtparlement</label>
                        <input type="text" class="form-control" id="function" name="function" value="<?php echo htmlspecialchars($user['function']); ?>" disabled>
                    </div>
                    <div class="form__bio">
                        <label for="inputBio" class="form-label">Biografie</label>
                        <textarea class="form-control" name="bio" id="inputbio" cols="30" rows="10" placeholder="<?php echo htmlspecialchars($user['bio']); ?>"></textarea>
                    </div>
                    <div class="form__btns">
                        <button type="submit" class="btn btn-primary">Opslaan</button>
                        <a href="#" class="btn btn-outline-secondary">Annuleer</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>