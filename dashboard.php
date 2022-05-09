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
        <div class="dashboard-welcome">
            <h5>Overzicht</h5>
            <p>Hallo, welkom bij het Buurtparlement</p>
        </div>

        <div class="dashboard-main">
            <div class="dashboard-main-news d-flex gap-4 rounded-4 bg-white" style="overflow-x: scroll;">
                <a class="card d-inline-block" style="width: 24rem; height: 24rem;">
                    <img src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.groene-poort.nl%2Fimage%2Fpicture%2FGROENEPOORT01138_940x470.jpg&f=1&nofb=1" alt="foto" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Text van de kaart.</p>
                    </div>
                </a>
            </div>

            <div class="dashboard-main-forum rounded-4 bg-white p-4">
                <h5>Forum</h5>
                <table class="table">
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
                                <img class="rounded-circle me-2" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.PtAghFSwI4d40TBvu7DFDwHaHa%26pid%3DApi&f=1" alt="Picture Author" width="50" height="50">
                                Jef
                            </th>
                            <td>Lancering Buurtparlement Dashboard</td>
                            <td>2022-05-25</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="dashboard-main-agenda rounded-4 bg-white">
                Agenda blok
            </div>
        </div>
    </main>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>