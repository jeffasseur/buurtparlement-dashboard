<?php 
include_once('bootstrap.php');
 $agenda = true;






?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filemanager | Buurtparlement</title>

    <?php include_once('inc/head.inc.php'); ?>
</head>
<body id="body-pd">
    <?php include_once('inc/header.inc.php'); ?>

    <main class="container-fluid">
        <div class="forum-welcome p-4 d-flex justify-content-between align-items-center mb-4">
            <h2>Agenda</h2>
        </div>

        <div class="agenda__main d-flex justify-content-around">
            <div class="agenda">
                <?php include_once('inc/calendar.inc.php'); ?>
            </div>

            <div class="agenda-todo">
                <h3>Todo's:</h3>
                <ul>
                    <li>Todo 1</li>
                    <li>Todo 2</li>
                </ul>
            </div>
        </div>
    </main>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>