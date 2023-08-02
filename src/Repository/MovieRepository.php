<?php

namespace App\Repository;

use App\Models\Movie;
use App\Service\PDOService;
use PDO;
class MovieRepository
{

    private PDOService $pdoService;
    private string $queryAll = 'SELECT * FROM movie';


    public function __construct()
    {
        $this->pdoService = new PDOService();
    }
    //array de Movie si en objet
    public function findAll():array
    {
        return $this->pdoService->getPdo()->query($this->queryAll)->fetchAll();
    }

    //array de Movie si en objet
    public function findByTitle(string $title):array
    {
        $query = $this->pdoService->getPdo()->prepare('SELECT * FROM movie WHERE title LIKE :title');
        $like = '%'. $title. '%';
        $query->bindParam(':title', $like);
        $query->execute();
        return $query->fetchAll($this->pdoService->getPdo()::FETCH_ASSOC);
    }

    //Movie si en objet
    /**
     * @param Movie|array $movie
     * @return Movie|array
     */
    public function insertMovie(Movie|array $movie): Movie|array
    {
        $query = $this->pdoService->getPdo()->prepare('INSERT INTO movie Value (NULL, :title, :release_date)');
        $title = $movie['title'];
        $releaseDate = $movie['releaseDate'];
        $query->bindParam(':title', $title);
        $query->bindParam(':release_date', $releaseDate);
        $query->execute();
        return $movie;
    }

    public function convertDataToObject(Object $dataBaseObject):Movie
    {
        $movie = new Movie();
        $movie->setId($dataBaseObject->id);
        $movie->setTitle($dataBaseObject->title);
        $movie->setReleaseDate(new \DateTime($dataBaseObject->releaseDate));
        return $movie;
    }
}