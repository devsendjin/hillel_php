<?php


namespace App\Model;


final class Database
{
    private static $instance = null;
    private \PDO $connection;

    private string $host = 'mysql';
    private string $user = 'root';
    private string $pass = '1';
    private string $name = 'crud';

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->connection = new \PDO("mysql:host={$this->host}; dbname={$this->name}", $this->user,$this->pass,
                             array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public static function getInstance(): self
    {
        if(!self::$instance)
        {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getConnection(): \PDO
    {
        return $this->connection;
    }

}