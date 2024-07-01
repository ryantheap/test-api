<?php
namespace App\Models;

use PDO;
use PDOException;

abstract class BaseModel
{
    protected $db;

    public function __construct()
    {

        // // Connexion DB 1
        // $dsn = 'mysql:host='.getenv('DB_HOST').':'.getenv('DB_PORT').';dbname='.getenv('DB_NAME').';charset=utf8';
        // $username = getenv('DB_USER');
        // $password = getenv('DB_PASSWORD');
        // $options = [
        //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        //     PDO::ATTR_EMULATE_PREPARES => false,
        // ];

        // try {
        //     $this->db = new PDO($dsn, $username, $password, $options);
        // } catch (PDOException $e) {
        //     throw new PDOException($e->getMessage(), (int)$e->getCode());
        // }
    }
}
