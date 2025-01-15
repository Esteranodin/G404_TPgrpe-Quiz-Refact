<?php

final class Database
{
    private static ?PDO $db = null;

    public static function getConnection(): PDO
    {
        if (self::$db === null){
            try {
                $host = "localhost";
                $dbname = "quiz_td";
                $login = "root";
                $password = "";

                self::$db = new PDO("mysql:host={$host};dbname={$dbname}" , $login, $password);
            } catch (PDOException $error) {
                echo "Erreur de connexion : " . $error->getMessage();
            }
        }

        return self::$db;
    }
}