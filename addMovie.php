<?php


include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;

$movieRepository = new MovieRepository();

if(isset($_POST["title"]) && isset($_POST["releaseDate"])) {

    $movieRepository->insertMovie([
        'title' => $_POST["title"],
        'releaseDate' => $_POST['releaseDate']
    ]);

}

header('location: index.php');
exit();