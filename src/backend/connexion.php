<?php
require_once __DIR__ . '/vendor/autoload.php'; // Charge Composer et les dépendances

use Dotenv\Dotenv;

class Connexion
{
    private $pdo;

    public function __construct()
    {
        // Charger les variables d'environnement depuis le fichier .env
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        // Obtenir les valeurs des variables
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $database = $_ENV['DB_DATABASE'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        // Connexion à la base de données avec PDO
        try {
            $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}


