<?php

namespace app\models;

use app\engine\Db;

abstract class DBModel extends Model {

    abstract protected static function getTableName();

    public static function getLimit($limit)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        
        return Db::getInstance()->queryLimit($sql, $limit);
    }

    public static function getWhere($column, $value)
    {
        $sql = " WHERE `{$column}` = {$value}";
        return $sql;
    }

    // public function where($column, $value)
    // {
    //     $this->wheres[] = [
    //         'column' => $column,
    //         'value' => $value,
    //     ];
    //     return $this;
    // }

    // public function andWhere($column, $value)
    // {
    //     return $this->where($column, $value);
    // }

    public static function getCount()
    {
        //получить кол-во
    }

    public static function getSumm()
    {
        //получить сумму
    }

    public static function getJoin()
    {
        # code...
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return DB::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }
    public static function getAll($where = null)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        if($where != null){
            $sql .= $where;
        }
        return DB::getInstance()->queryAll($sql);
    }

    protected function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            $params[":{$key}"] = $this->$key;
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

    protected function update()
    {
        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            if(!$value) continue;
            $params["{$key}"] = $this->$key;
            $columns[] .= "`{$key}` = :{$key}";
            $this->props[$key] = false;
        }

        $columns = implode(", ", $columns);
        $tableName = static::getTableName();
        $params['id'] = $this->id;
        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE id = :id";
        var_dump($sql);
        return DB::getInstance()->execute($sql, $params);
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE id = :id";

        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function save()
    {
        if (is_null($this->id)){
            return $this->insert();
        } else {
            return $this->update();
        }
    }
}
