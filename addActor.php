<?php


include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\ActorRepository;

$actorRepository = new ActorRepository();

if(isset($_POST["first-name"]) && isset($_POST["last-name"])) {

    $actorRepository->insertActor([
        'first-name' => $_POST["first-name"],
        'last-name' => $_POST['last-name']
    ]);

}

header('location: index.php');
exit();