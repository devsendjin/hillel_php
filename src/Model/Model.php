<?php

namespace App\Model;

abstract class Model
{
    private static \PDO $db;

    abstract static function getTable(): string;
    abstract function getId(): ?int;

    /**
     * static method for database connection
     */
    public static function dbConnect(): void
    {
        static::$db = new  \PDO('mysql:host=mysql;dbname=crud;', 'root', 1);
    }

    /**
     * @param int $id
     * @return self
     */
    public static function find(int $id): self
    {
        try {
            $sql = 'SELECT * from `' . static::getTable() . '` where `id` = :id';
            $stmt = static::$db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }

        $instance = new static();

        foreach ($result as $fieldName => $value) {
            $methodName = 'set' . ucfirst($fieldName);
            $instance->$methodName($value);
        }

        return $instance;
    }

    public function create(): void
    {
        try {
            $sql = 'insert into `' . static::getTable() . '` values(:id, :name, :email)';
            $stmt = static::$db->prepare($sql);
            $stmt->bindParam(':id', $this->getId());
            $stmt->bindParam(':name', $this->getName());
            $stmt->bindParam(':email', $this->getEmail());
            $stmt->execute();
        } catch (\PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    public function read()
    {
        try {
            $sql = 'select * from `' . static::getTable() . '` where `id`=:id';
            $stmt = static::$db->prepare($sql);
            $stmt->bindParam(':id', $this->getId());
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    public function update(): void
    {
        try {
            $sql = 'update `' . static::getTable() . '` set `name` = :name, `email` = :email where `id`=:id';
            $stmt = static::$db->prepare($sql);
            $stmt->bindParam(':id', $this->getId());
            $stmt->bindParam(':name', $this->getName());
            $stmt->bindParam(':email', $this->getEmail());
            $stmt->execute();
        } catch (\PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }

    }

    public function delete(): void
    {
        try {
            $sql = 'delete from `' . static::getTable() . '` where `id` = :id';
            $stmt = static::$db->prepare($sql);
            $stmt->bindParam(':id', $this->getId());
            $stmt->execute();
        } catch (\PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

}
