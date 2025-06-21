<?php

class connexion {
    private static $host = "localhost";
    private static $dbname = "bissmoi";
    private static $username = "root";
    private static $password = "";
    private static $connexion = null;

    public static function connect() {
        if (self::$connexion === null) {
                self::$connexion = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$dbname,
                    self::$username,
                    self::$password
                );
        }

        return self::$connexion;
    }

    public static function disconnect() {
        self::$connexion = null;
    }
}