<?php


namespace App;

/**
 * Class QueryCreator
 * @package App
 * @method static findById(int $id)
 * @method static findByEmailAndByStatus(string $email, string $status)
 * @method static findBetweenCreatedAt(string $startDate, string $endDate)
 * @method static findBetweenCreatedAtAndByStatus(string $startDate, string $endDate, string $status)
 * @method static findBetweenCreatedAtAndInStatus(string $startDate, string $endDate, string[] $states)
 */
class QueryCreator
{

    const TABLE_NAME = 'users';

    public static function __callStatic($name, $arguments)
    {
        switch ($name) {
            case 'findById':
                $statement = 'SELECT * FROM `' . self::TABLE_NAME . '` WHERE id = ' . $arguments[0];
                break;
            case 'findByEmailAndByStatus':
                $statement = 'SELECT * FROM `' . self::TABLE_NAME . '` WHERE email = ' . $arguments[0] . ' AND status = ' . $arguments[1];
                break;
            case 'findBetweenCreatedAt':
                $statement = 'SELECT * FROM `' . self::TABLE_NAME . '` WHERE created_at BETWEEN ' . $arguments[0] . ' AND ' . $arguments[1];
                break;
            case 'findBetweenCreatedAtAndByStatus':
                $statement = 'SELECT * FROM `' . self::TABLE_NAME . '` WHERE created_at BETWEEN ' . $arguments[0] . ' AND ' . $arguments[1] . ' AND status = ' . $arguments[2];
                break;
            case 'findBetweenCreatedAtAndInStatus':
                if (!is_array($arguments[2])) {
                    $statement = 'SELECT * FROM `' . self::TABLE_NAME . '` WHERE created_at BETWEEN ' . $arguments[0] .  ' AND '. $arguments[1] . ' AND status = ' . $arguments[2];
                } else {
                    $statement = 'SELECT * FROM `' . self::TABLE_NAME . '` WHERE created_at BETWEEN ' . $arguments[0] .  ' AND '. $arguments[1] . ' AND status IN (';
                    $argsLength = count($arguments[2]);
                    foreach ($arguments[2] as $index => $arg) {
                        if ($index === $argsLength - 1) {
                            $statement .= $arg . ')';
                        } else {
                            $statement .= $arg . ', ';
                        }
                    }
                }
                break;
        }
        return $statement;
    }
}
