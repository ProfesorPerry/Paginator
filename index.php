<?php

use App\Config\Database as DatabaseConfig;
use App\Config\Paginator as PaginatorConfig;
use App\Database\Connection;
use App\Paginator\Paginator;

require 'vendor/autoload.php';

$dbConfig = DatabaseConfig::getParams();
$dbConnection = new Connection($dbConfig);
$pdo = $dbConnection->getPdo();

$sth = $pdo->prepare("SELECT * FROM books");
$sth->execute();

$resultSet = $sth->fetchAll(PDO::FETCH_ASSOC);

$paginatorConfig = PaginatorConfig::getParams();
$paginator = new Paginator($paginatorConfig, $resultSet);
$result = $paginator->getChunk();

?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">

    <title>Stronicowanie</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center text-primary mt-4 mb-4">Stronicowanie w języku PHP</h2>

        <?php $paginator->display(); ?>

        <?php foreach ($result as $row): ?>
            <p><?= $row['title']; ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>
