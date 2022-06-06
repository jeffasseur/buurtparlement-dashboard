<?php 
include_once('bootstrap.php');
include_once('functions.php');
include_once(__DIR__ . "/classes/DB.php");

 $agenda = true;
 $title = "Agenda";

 session_start();

 if(!isset($_SESSION['user'])) {
     header("Location: login.php");
 } else {
     $user = User::getUser($_SESSION['user']['id']);
 }

 if(!empty($_POST)) {
     if(!empty($_POST['title']) && !empty($_POST['date'])) {
        $eventTitle = $_POST['title'];
        $date = $_POST['date'];
        $created = date("Y-m-d H:i:s");
        $modified = date("Y-m-d H:i:s"); 

        $conn = DB::getConnection();
        $statement = $conn->prepare("insert into events (title, date, created, modified) values (:title, :date, :created, :modified)");
        $statement->bindParam(":title", $eventTitle);
        $statement->bindParam(":date", $date);
        $statement->bindParam(":created", $created);
        $statement->bindParam(":modified", $modified);

        $statement->execute();
     } else {
         $error = "Vul alle velden in.";
     }
 }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda | Buurtparlement</title>

    <?php include_once('inc/head.inc.php'); ?>

    <!-- JQUERY LIB -->
    <link rel="stylesheet" href="css/calendar.css">
    <script src="js/jquery.min.js"></script>

</head>
<body>
    <?php include_once('inc/aside.inc.php'); ?>

    <div class="ownContainer">
        <?php include_once('inc/header.inc.php'); ?>

        <div id="calendar_div">
            <?php echo getCalender(); ?>
        </div>

        <div class="add-event">
            <h5 class="mb-4">Voeg nieuw item toe aan de agenda</h5>
            <?php if(isset($error)): ?>
                <p class="alert-danger"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <div class="title mb-4">
                    <label for="title">Titel</label> <br>
                    <input type="text" name="title" id="title">
                </div>

                <div class="date mb-4">
                    <label for="date">Datum</label> <br>
                    <input type="date" name="date" id="date">
                </div>

                <div class="submit">
                    <input class="btn btn-primary" type="submit" name="submit" value="Toevoegen">
                </div>
            </form>
        </div>
    </div>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>