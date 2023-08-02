<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;
use App\Repository\ActorRepository;


$movieRepository = new MovieRepository();
$movies = $movieRepository->findAll();

$actorRepository = new ActorRepository();
$actors = $actorRepository->findAll();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ajouter un film</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 justify-content-between">
        <a class="navbar-brand" href="index.php">Allociné</a>
        <div class="collapse navbar-collapse w-100 justify-content-between" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/template/add_movie.html">Ajouter un film</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/template/add_actor.html">Ajouter un acteur</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 d-flex" action="searchMovie.php" method="post">
                <input class="form-control mr-sm-2 m-1" type="text" id="title-search" name="title-search" placeholder="Rechercher un film" aria-label="Search">
                <button class="btn btn-outline-light m-1 my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>
</header>
<div class="text-center w-100 d-flex align-items-center justify-content-center">
    <div class="mx-auto w-75">
        <h1 class="mb-5">Liste des films</h1>

        <table class="table">
            <tbody>
            <tr>
                <th scope="row">ID</th>
                <?php foreach ($movies as $movie) : ?>
                    <td><?= $movie["id"] ?></td>
                <?php endforeach ?>
            </tr>
            <tr>
                <th scope="row">TITLE</th>
                <?php foreach ($movies as $movie) : ?>
                    <td><?= $movie["title"] ?></td>
                <?php endforeach ?>
            </tr>
            <tr>
                <th scope="row">Date</th>
                <?php foreach ($movies as $movie) : ?>
                    <td><?= $movie["release_date"]?></td>
                <?php endforeach ?>
            </tr>
            </tbody>
        </table>

    </div>
</div>
<div class="text-center w-100 d-flex align-items-center justify-content-center">
    <div class="mx-auto w-75">
        <h1 class="mb-5">Liste des Acteurs</h1>

        <table class="table">
            <tbody>
            <tr>
                <td scope="row">ID</td>
                <?php foreach ($actors as $actor) : ?>
                    <th><?= $actor["id"] ?></th>
                <?php endforeach ?>
            </tr>
            <tr>
                <th scope="row">Firstname</th>
                <?php foreach ($actors as $actor) : ?>
                    <td><?= $actor["first_name"] ?></td>
                <?php endforeach ?>
            </tr>
            <tr>
                <th scope="row">Lastname</th>
                <?php foreach ($actors as $actor) : ?>
                    <th><?= $actor["last_name"] ?></th>
                <?php endforeach ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
