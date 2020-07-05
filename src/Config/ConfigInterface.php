<?php


namespace App\Config;


interface ConfigInterface
{

    /**
     * @return mixed
     */
    public static function getParams();
}