
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

<?php

include_once __DIR__ . '/vendor/autoload.php';



use App\Repository\MovieRepository;




$movieRepository = new MovieRepository();




if (isset($_POST['title-search'])) {
    $movies = $movieRepository->findByTitle(
        $_POST['title-search']
    );
    foreach ($movies as $movie) {
        echo($movie['title']);
    }

}
