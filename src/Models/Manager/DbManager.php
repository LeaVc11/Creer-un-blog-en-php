<?php

namespace App\Models\Manager;

use PDO;
use PDOException;

abstract class DbManager
{
    private static $pdo;

    /**
     * @return mixed
     */
    protected function getBdd(): mixed
    {
        if (self::$pdo === null) {
            self::setBdd();
        }

        return self::$pdo;
    }

    /**
     * @return void
     */
    private static function setBdd(): void
    {

        try {
            self::$pdo = new PDO("mysql:host=localhost;dbname=blog_php;charset=utf8", "blog_php", "Cz4U2GpWe48b");            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            print "error in connection" . $e->getMessage();
        }
    }
}
