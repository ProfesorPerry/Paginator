<?php


namespace App\Config;


class Paginator implements ConfigInterface
{

    /**
     * @inheritDoc
     */
    public static function getParams()
    {
        return include $_SERVER['DOCUMENT_ROOT'] . '/config/paginator.config.php';
    }
}