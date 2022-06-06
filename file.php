<?php 
    include_once('bootstrap.php');
    $filemanager = true;
    $title = "Documenten";

    // get file with id from URL
    $id = $_GET['id'];
    $document = Document::getById($id);


    session_start();

    if(!isset($_SESSION['user'])) {
        header("Location: login.php");
    } else {
        $user = User::getUser($_SESSION['user']['id']);
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtparlement | <?php echo "filename"; ?></title>

    <?php include_once('inc/head.inc.php'); ?>
</head>
<body>
    <?php include_once('inc/aside.inc.php'); ?>
    
    <div class="ownContainer">
        <?php include_once('inc/header.inc.php'); ?>

        <main class="file-container">
            <h2><?php echo $document['title']; ?></h2>

            <iframe 
                class="preview-doc rounded-3" 
                src="<?php echo $document['path']; ?>" 
                width="100%" 
                height="100%" 
                frameborder="0"
                scrolling="auto">
            </iframe>
        </main>
    </div>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>