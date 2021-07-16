<?php

namespace app\config;

use PDO;
use PDOException;

class  Db
{
    private const DSN = 'pgsql:dbname=mvc;host=PROJECT_CRUD_POSTGRES';
    private const USER = 'dev';
    private const PASS = 'dev';

    private static ?PDO $pdo = null;

    public static function getDbh(): ?PDO
    {
        if (!self::$pdo) {
            try {
                self::$pdo = new PDO(
                    self::DSN,
                    self::USER,
                    self::PASS,
                );
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            } catch (PDOException $e) {
                exit('Error connecting to database: ' . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
