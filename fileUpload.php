<?php 
include_once('bootstrap.php');
 $filemanager = true;
 $title = "Document upload";

 session_start();

 if(!isset($_SESSION['user'])) {
     header("Location: login.php");
 } else {
     $user = User::getUser($_SESSION['user']['id']);
 }

 // File upload
 if (!empty($_POST)) {
    $title = $_POST['title'];
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    if ($fileError === 0) {
        if ($fileSize < 1000000) {
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = 'uploads/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);

            $document = new Document();
            $document->setTitle($title);
            $document->setPath($fileDestination);
            $document->setTime(date('Y-m-d'));
            $document->setUserId($_SESSION['user']['id']);
            $document->setName($fileName);
            $document->setType($fileName);
            $document->setTmpName($fileTmpName);

            $document->save();

            header('Location: documenten.php');

        } else {
            $error = true;
            $errorMessage = "Your file is too big! Try to upload a smaller file.";
        }
    } else {
        $error = true;
        $errorMessage = "There was an error uploading your file! Try again.";
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtparlement | Document Uploaden</title>

    <?php include_once('inc/head.inc.php'); ?>
</head>
<body>
    <?php include_once('inc/aside.inc.php'); ?>

    <div class="ownContainer">
        <?php include_once('inc/header.inc.php'); ?>

        <main class="container-fluid upload">
            <div class="upload-container">
                <h5>Document toevoegen</h5>
        
                <?php if (isset($error) && !empty($error)): ?>
                    <p class="error alert-danger"> <?php echo $error; ?> </p>
                <?php endif; ?>
        
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titel van het document</label>
                        <input type="text" name="title" id="title" class="form-control">                        
                    </div>
                    <div class="mb-4">
                        <label for="file" class="form-label">Kies je document</label>
                        <input type="file" name="file" id="file" class="form-control mb-2" accept=".xlsx, .xls, .doc, .docx, .ppt, .pptx, .txt, application/pdf, .pages">
                        <p><small class="text-muted">Je kan hier alleen documenten selecteren die eindigen op: <br> doc, docx, pdf, txt, ppt, pptx, xls en xlsx</small></p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Voeg document toe</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>