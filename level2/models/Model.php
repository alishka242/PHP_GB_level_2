<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    abstract static protected function getTableName();

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return DB::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }
    public function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return DB::getInstance()->queryAll($sql);
    }

    // нужно еще подумать над реализацией другиз таблиц, ведь колонки будут разные. 
    public function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $params[":{$key}"] = $value;
            $columns[] = $key;
        }

        $columns = implode(', ', $columns);
        $value = implode(', ', array_keys($params));
        $tableName = static::getTableName();

        $sql = "INSERT INTO `{$tableName}` ({$columns}) VALUES ({$value})";

        DB::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();
        return $this;
    }

    // нужно еще подумать над реализацией другиз таблиц, ведь колонки будут разные. 
    public function update()
    {
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET () WHERE id = ";

        return DB::getInstance()->execute($sql);
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE id = :id";

        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }
}
