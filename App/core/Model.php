<?php

namespace App\Core;
class Model {

    private static $instance;

    public static function getConn() {

        if(!isset(self::$instance)):
            self::$instance = new \PDO ('mysql:host=localhost;dbname=mvc;charset=utf8', 'root', '12345');
            return self::$instance;
        else:
            return self::$instance;
        endif;

    }

}