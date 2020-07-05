<?php


namespace App\Database;


use PDO;
use PDOException;

class Connection
{

    /**
     * @var PDO
     */
    private $pdo;

    /**
     * Connection constructor.
     * @param array $databaseConfig
     */
    public function __construct(array $databaseConfig)
    {
        $dsn = 'mysql:dbname=' . $databaseConfig['database'] . ';host=' . $databaseConfig['host'] . ';charset=utf8';
        $username = $databaseConfig['username'];
        $password = $databaseConfig['password'];

        try {
            $this->pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            echo $e->getMessage() . '<br>';
            echo "Additional info: spróbuj uzupełnić plik konfiguracyjny o poprawne dane serwera bazodanowego";
            exit();
        }
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }
}