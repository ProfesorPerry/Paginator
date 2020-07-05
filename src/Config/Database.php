<?php


namespace App\Config;


class Database implements ConfigInterface
{

    /**
     * @inheritDoc
     */
    public static function getParams()
    {
        return include $_SERVER['DOCUMENT_ROOT'] . '/config/database.config.php';
    }
}