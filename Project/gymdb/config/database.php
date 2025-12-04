<?php
class Database {
    private static $host = "localhost";
    private static $db   = "gymdb";
    private static $user = "root";
    private static $pass = "";

    public static function connect() {
        $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=utf8mb4";
        $pdo = new PDO($dsn, self::$user, self::$pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    }
}
