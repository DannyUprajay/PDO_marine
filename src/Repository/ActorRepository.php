<?php

namespace App\Repository;

use App\Models\Actor;
use App\Service\PDOService;

class ActorRepository
{

    private PDOService $pdoService;
    private string $queryAll = 'SELECT * FROM actor';

    public function __construct()
    {
        $this->pdoService = new PDOService();
    }
    //array d'Actor si en objet
    public function findAll():array
    {
        return $this->pdoService->getPdo()->query($this->queryAll)->fetchAll();
    }

    //Actor si en objet
    public function insertActor(Actor|array $actor): Actor|array
    {
        $query = $this->pdoService->getPdo()->prepare('INSERT INTO actor Value (NULL, :firstname, :lastname)');
        var_dump($actor);
        $firstname = $actor['first-name'];
        $lastname = $actor['last-name'];
        $query->bindParam(':firstname', $firstname);
        $query->bindParam(':lastname', $lastname);
        $query->execute();
        return $actor;
    }

    public function convertDataToObject(Object $dataBaseObject):Actor
    {
        $movie = new Actor();
        $movie->setId($dataBaseObject->id);
        $movie->setFirstName($dataBaseObject->firstNametle);
        $movie->setLastName($dataBaseObject->lastName);
        return $movie;
    }
}