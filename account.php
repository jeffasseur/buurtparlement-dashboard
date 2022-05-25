<?php
include_once('bootstrap.php');
    $account = true;
    $loggedin = true;

    if(!$loggedin && !empty($_POST)) {
        $email = $_POST['inputEmail'];
        $password = $_POST['Wachtwoord'];

        if($email == 'admin@buurtparlement.be' && $password == 'admin') {
            $loggedin = true;
            session_start();
        }
    }

    //user
    $user = User::getUser(1);


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtparlement | Account</title>

    <?php include_once('inc/head.inc.php') ?>
</head>
<body id="body-pd">
    <?php include_once('inc/header.inc.php'); ?>

    <main class="account container-fluid d-flex px-2">
        <?php if($loggedin): ?>
            <div class="px-2 col-md-4">
                <div class="account__box d-flex flex-column justify-content-center align-items-center">
                    <img src="<?php echo htmlspecialchars($user['profile_img']); ?>" alt="Profiel Foto" height="180" width="180" class="account__box__img rounded-circle" style="object-fit: cover;">
                    <h2 class="text-center"><?php echo htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']); ?></h2>
                    <button class="btn btn-primary">Nieuwe profielfoto</button>
                </div>
            </div>

            <div class="px-2 col-md-8 p-4 bg-white rounded-5">
                <h3 class="m-4 pb-4">Algemene Informatie</h3>
                <form action="" method="POST" class="row g-3 p-4">
                    <div class="col-md-6 mb-3">
                        <label for="inputVoornaam" class="form-label">Voornaam</label>
                        <input type="text" name="voornaam" id="inputVoornaam" class="form-control" placeholder="<?php echo htmlspecialchars($user['firstname']); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputAchternaam" class="form-label">Achternaam</label>
                        <input type="text" name="voornaam" id="inputAchternaam" class="form-control" placeholder="<?php echo htmlspecialchars($user['lastname']); ?>">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo htmlspecialchars($user['email']); ?>">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="inputFunctie" class="form-label">Functie binnen Buurtparlement</label>
                        <input type="text" class="form-control" id="inputFunctie" placeholder="<?php echo htmlspecialchars($user['function']); ?>">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="inputBio" class="form-label">Biografie</label>
                        <textarea class="form-control" name="inputBio" id="inputbio" cols="30" rows="10" placeholder="<?php echo htmlspecialchars($user['bio']); ?>"></textarea>
                    </div>
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-primary">Opslaan</button>
                        <a href="#" class="btn btn-outline-secondary">Annuleer</a>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <div class="account__login d-flex justify-content-center container align-items-center">
                <div class="px-2 col-md-8 p-4 bg-white rounded-5">
                    <h3 class="m-4 pb-4">Log in</h3>
                    <form action="" method="POST" class="row g-3 p-4">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" name="inputEmail" id="inputEmail" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="inputWachtwoord" class="form-label">Wachtwoord</label>
                            <input type="password" name="Wachtwoord" id="inputWachtwoord" class="form-control">
                        </div>
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>