<?php 
 include_once('bootstrap.php');
 include_once('functions.php');

 session_start();
 $dashboard = true;
 $title = "Dashboard";

 // Forum
 $posts = Forum::getAll();

 // User
 if(isset($_SESSION['user'])) {
    $user = User::getUser($_SESSION['user']['id']);
 }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtparlement | Dashboard</title>

    <?php include_once('./inc/head.inc.php') ?>

    <!-- JQUERY LIB -->
    <link rel="stylesheet" href="css/calendar.css">
    <script src="js/jquery.min.js"></script>

    <style>
        .dashboard-agenda h5 {
            margin-bottom: 1.5rem;
        }
        .calendar-contain {
            box-shadow: none;
            border: none;
        }
        .calendar__sidebar {
            width: 100%;
            margin: 0 auto;
            position: relative;
            float: none;
            padding-bottom: 0.7rem;
            border-right: none;
        }

        .title-bar, .sidebar__heading, .calendar__sidebar, .calendar__task {
            display: none;
        }  

        .calendar__days {
            width: 100%;
        }

        .calendar__days .calendar__week .calendar__day .calendar__date {
            font-size: 1.5rem;
        } 
    </style>
</head>
<body>
    <?php include_once('inc/aside.inc.php'); ?>

    <div class="ownContainer">
        <?php include_once('./inc/header.inc.php') ?>

        <main class="dashboard">            
            <div class="dashboard-news">
                <a class="dashboard-news-article" style="cursor: pointer;">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.nieuwsblad.be%2FAssets%2FImages_Upload%2F2019%2F09%2F21%2F45100c2a-dbbc-11e9-86bf-f2e777b82b67.jpg%3Fwidth%3D1152%26format%3Djpg&f=1&nofb=1" alt="foto" style="object-fit: cover; height: 14rem; max-height: 14rem;">
                    <div class="bg-trans">
                        <h6 class="card-title">GEZOCHT: Een nieuwe naam voor de kerk in de Adegemstraat</h6>
                    </div>
                </a>
            </div>

            <div class="dashboard-forum">
                <a href="forum.php"><h5>Forum</h5></a>
                <table class="table table-hover align-middle" style="overflow-x: scroll;">
                    <thead class="text-muted">
                        <tr>
                            <th scope="col">Auteur</th>
                            <th scope="col">Onderwerp</th>
                            <th scope="col">Datum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $p): ?>
                        <tr>
                            <th class="forumTable-author" scope="row">
                                <img class="rounded-circle me-2 hide-mobile" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.PtAghFSwI4d40TBvu7DFDwHaHa%26pid%3DApi&f=1" alt="Picture Author" width="35" height="35">
                                Jef
                            </th>
                            <td>
                                <a href="forum-post.php?id=<?php echo htmlspecialchars($p['id']); ?>">
                                    <?php echo htmlspecialchars($p['title']); ?>
                                </a>
                            </td>
                            <td><?php echo htmlspecialchars($p['time']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="dashboard-agenda">
                <a href="agenda.php"><h5>Agenda</h5></a>
                <?php echo getCalender(); ?>
            </div>
        </main>
    </div>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>