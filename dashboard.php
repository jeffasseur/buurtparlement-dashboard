<?php 
 $dashboard = true;

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtparlement | Dashboard</title>

    <?php include_once('inc/head.inc.php') ?>
</head>
<body id="body-pd" class="bg-light">
    <?php include_once('inc/header.inc.php'); ?>

    <main class="container-fluid">
        <div class="dashboard-welcome p-4">
            <h2>Dashboard</h2>
            <p>Hallo, welkom bij het Buurtparlement</p>
        </div>

        <div class="dashboard-main">
            <div class="dashboard-main-news rounded-4 bg-white p-4">
                <h3 class="mb-3">Nieuws</h3>
                <div class="dashboard-main-news-cardDeck d-flex gap-4" style="overflow-x: scroll;">
                    <a class="card d-inline-block bg-light" style="width: 24rem; height: 24rem; min-width:24rem;">
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.nieuwsblad.be%2FAssets%2FImages_Upload%2F2019%2F09%2F21%2F45100c2a-dbbc-11e9-86bf-f2e777b82b67.jpg%3Fwidth%3D1152%26format%3Djpg&f=1&nofb=1" alt="foto" class="card-img-top" style="object-fit: cover; height: 14rem; max-height: 14rem;">
                        <div class="card-body">
                            <h5 class="card-title">Titel kaart</h5>
                            <p class="card-text">Text van de kaart.</p>
                        </div>
                    </a>


                    <a class="card d-inline-block bg-light" style="width: 24rem; height: 24rem; min-width:24rem;">
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Fb4%2F7f%2F68%2Fb47f681c398953400f8c60cc643bedd0.jpg&f=1&nofb=1" alt="foto" class="card-img-top" style="object-fit: cover; height: 14rem; max-height: 14rem;">
                        <div class="card-body">
                            <h5 class="card-title">Titel kaart</h5>
                            <p class="card-text">Text van de kaart.</p>
                        </div>
                    </a>

                    <a class="card d-inline-block bg-light" style="width: 24rem; height: 24rem; min-width:24rem;">
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmichaelblogt.files.wordpress.com%2F2019%2F05%2Fimg_5689.jpg%3Fstrip%3Dinfo%26w%3D1800&f=1&nofb=1" alt="foto" class="card-img-top" style="object-fit: cover; height: 14rem; max-height: 14rem;">
                        <div class="card-body">
                            <h5 class="card-title">Titel kaart</h5>
                            <p class="card-text">Text van de kaart.</p>
                        </div>
                    </a>
                </div>
            </div>
            

            <div class="dashboard-main-forum rounded-4 bg-white p-4">
                <h3 class="mb-3">Forum</h3>
                <table class="table table-hover align-middle" style="overflow-x: scroll;">
                    <thead class="text-muted">
                        <tr>
                            <th scope="col">Auteur</th>
                            <th scope="col">Onderwerp</th>
                            <th scope="col">Datum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <img class="rounded-circle me-2 hide-mobile" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.PtAghFSwI4d40TBvu7DFDwHaHa%26pid%3DApi&f=1" alt="Picture Author" width="35" height="35">
                                Jef
                            </th>
                            <td>Lancering Buurtparlement Dashboard</td>
                            <td>2022-05-25</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="dashboard-main-agenda rounded-4 bg-white p-4">
                <h3 class="mb-3">Agenda</h3>
                <div class="agenda">
                    <?php include_once('inc/calendar.inc.php'); ?>
                </div>
            </div>
        </div>
    </main>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>