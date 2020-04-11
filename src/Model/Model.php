<?php

namespace App\Model;

use PDO;
use PDOException;

abstract class Model
{
    private static PDO $db;

    abstract static function getTable(): string;
    abstract function getId(): ?int;

    /**
     * static method for database connection
     * @param PDO $db
     */
    public static function dbConnect(PDO $db): void
    {
        static::$db = $db;
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
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }

        $instance = new static();

        foreach ($result as $fieldName => $value) {
            $methodName = 'set' . ucfirst($fieldName);
            $instance->$methodName($value);
        }

        return $instance;
    }

    /**
     * @param string[] $fieldNames
     */
    public function create(array $fieldNames = []): void
    {
        if (empty($fieldNames)) {
            throw new \InvalidArgumentException('Field names are not specified');
        }

        try {
            //формируем sql выражение
            $sql = 'insert into `' . static::getTable() . '` values(:id, ';
            foreach ($fieldNames as $index => $fieldName) {
                $sql .= $index === count($fieldNames)-1 ? ":$fieldName" : ":$fieldName, ";
            }
            $sql .= ')';
            $stmt = static::$db->prepare($sql);
            $stmt->bindParam(':id', $this->getId());

            //биндим параметры
            foreach ($fieldNames as $fieldName) {
                $methodName = 'get' . ucfirst($fieldName);
                $stmt->bindParam(":$fieldName", $this->$methodName());
            }
            $stmt->execute();
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    /**
     * @return array
     */
    public function read(): array
    {
        try {
            $sql = 'select * from `' . static::getTable() . '` where `id`=:id';
            $stmt = static::$db->prepare($sql);
            $stmt->bindParam(':id', $this->getId());
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    /**
     * @param string[] $fieldNames
     */
    public function update(array $fieldNames = []): void
    {
        if (empty($fieldNames)) {
            throw new \InvalidArgumentException('Field names are not specified');
        }

        try {
            $sql = 'update `' . static::getTable() . '` set ';

            //формируем sql выражение
            foreach ($fieldNames as $index => $fieldName) {
                $sql .= $index === count($fieldNames)-1 ? "`$fieldName`=:$fieldName" : "`$fieldName`=:$fieldName, ";
            }
            $sql .= ' where `id`=:id';
            $stmt = static::$db->prepare($sql);
            $stmt->bindParam(':id', $this->getId());

            //биндим параметры
            foreach ($fieldNames as $fieldName) {
                $methodName = 'get' . ucfirst($fieldName);
                $stmt->bindParam(":$fieldName", $this->$methodName());
            }
            $stmt->execute();
        } catch (PDOException $error) {
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
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

}
