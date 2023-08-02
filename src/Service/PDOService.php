<?php

namespace App\Service;

use PDO;

class PDOService
{
    private PDO $PDO;

    private string $dsn = 'mysql:host=127.0.0.1:3306;dbname=marine_exam';
    private string $user = 'root';
    private string $password = '';

    public function __construct()
    {
        $this->PDO = new PDO($this->dsn, $this->user, $this->password);
    }

    public function getPdo(): PDO
    {
        return $this->PDO;
    }

}
