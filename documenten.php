<?php 
include_once('bootstrap.php');
 $filemanager = true;
 $title = "Documenten";

 session_start();

 if(!isset($_SESSION['user'])) {
     header("Location: login.php");
 } else {
     $user = User::getUser($_SESSION['user']['id']);
 }

 //Get all files
 $documents = Document::getAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtparlement | Documenten</title>

    <?php include_once('inc/head.inc.php'); ?>
</head>
<body>
    <?php include_once('inc/aside.inc.php'); ?>

    <div class="ownContainer">
        <?php include_once('inc/header.inc.php'); ?>

        <main>
            <div class="files-grid">
                <!-- Vaste Card om nieuwe files up te loaden -->
                <div class="files-grid-itemUpload">
                    <a class="box-upload d-flex justify-content-center align-items-center mb-3 rounded-3" href="fileUpload.php"></a>
                    <p><strong>Nieuw bestand</strong></p>    
                </div>
                <!-- Einde vaste Card -->
                <?php foreach($documents as $d): ?>
                <div class="files-grid-item">
                    <a class="doc-card bg-white d-flex justify-content-center align-items-center mb-3 rounded-3" href="file.php?id=<?php echo $d['id']; ?>" >
                        <i class="bx <?php echo $d['type']; ?> bx-xlg" style="color: #495EF9;"></i>
                    </a>
                    <p>
                        <a href="file.php?id=<?php echo $d['id']; ?>"><strong><?php echo $d['title']; ?></strong></a>
                        <br>
                        <small class="text-muted"><?php echo $d['time']; ?></small>
                    </p>
                </div>
                <?php endforeach; ?>  
            </div>
        </main>
    </div>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>