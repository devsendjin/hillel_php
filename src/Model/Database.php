<?php


namespace App\Model;


final class Database
{
    private static ?Database $instance = null;
    public static \PDO $pdo;

    /**
     * @param string $host
     * @param string $dbname
     * @param string $user
     * @param string $password
     * @return Database
     */
    public static function getInstance(string $host, string $dbname, string $user, string $password): Database
    {
        if (static::$instance === null) {
            static::$instance = new self($host, $dbname, $user, $password);
        }

        return static::$instance;
    }

    /**
     * Database constructor.
     * @param string $host
     * @param string $dbname
     * @param string $user
     * @param string $password
     */
    public function __construct(string $host, string $dbname, string $user, string $password)
    {
        static::$pdo = new  \PDO("mysql:host={$host};dbname={$dbname};", $user, $password);
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}