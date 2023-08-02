<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;

$movieRepository = new MovieRepository();

if (isset($_POST['title-search'])) {
    $movies = $movieRepository->findByTitle(
        $_POST['title-search']
    );
    foreach ($movies as $movie) {
        var_dump($movie['title']);
    }

}
