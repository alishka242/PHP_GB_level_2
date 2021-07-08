<?php
//хранилище
namespace app\models;

use app\engine\Db;
use app\engine\App;

abstract class Repository
{
    abstract protected function getTableName();
    abstract protected function getEntityClass();

    public function getLimit($limit)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";

        return App::call()->db->queryLimit($sql, $limit);
    }

    public function getCountWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT COUNT(id) as count FROM {$tableName} WHERE `{$name}`=:value";
        return App::call()->db->queryOne($sql, ['value' => $value])['count'];
    }

    public function getProductCountWhere($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT count as productCount FROM {$tableName} WHERE `id`=:id";
        return App::call()->db->queryOne($sql, ['id' => $id])['productCount'];
    }

    public function getSumWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT SUM(price * count) as sum FROM {$tableName} WHERE `{$name}` = :value";
        return App::call()->db->queryOne($sql, ['value' => "{$value}"])['sum'];
    }

    public function getJoin()
    {
        # code...
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return App::call()->db->queryOneObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getOneWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `{$name}` = :value";
        return App::call()->db->queryOneObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function getOneWhereAnd($name_1, $value_1, $name_2, $value_2)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `{$name_1}` = :value_1 AND `{$name_2}` = :value_2";
        return App::call()->db->queryOneObject($sql, ['value_1' => $value_1, 'value_2' => $value_2], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return App::call()->db->queryAll($sql);
    }

    protected function insert(Model $entity)
    {
        $params = [];
        $columns = [];

        foreach ($entity->props as $key => $value) {
            $params[":{$key}"] = $entity->$key;
            $columns[] = $key;
        }

        $columns = implode(', ', $columns);
        $value = implode(', ', array_keys($params));
        $tableName = $this->getTableName();

        $sql = "INSERT INTO `{$tableName}` ({$columns}) VALUES ({$value})";

        App::call()->db->execute($sql, $params);
        $entity->id = App::call()->db->lastInsertId();
    }

    protected function update(Model $entity)
    {
        $params = [];
        $columns = [];

        foreach ($entity->props as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $entity->$key;
            $columns[] .= "`{$key}` = :{$key}";
            $entity->props[$key] = false;
        }

        $columns = implode(", ", $columns);
        $tableName = $this->getTableName();
        $params['id'] = $this->id;
        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE id = :id";
        App::call()->db->execute($sql, $params);
    }

    public function delete(Model $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE id = :id";

        App::call()->db->execute($sql, ['id' => $entity->id]);
    }

    public function plus(Model $entity)
    {
        $tableName = $this->getTableName();
        $sql = "UPDATE `{$tableName}` SET `count` = `count` + 1 WHERE id = :id";

        App::call()->db->execute($sql, ['id' => $entity->id]);
    }

    public function minus(Model $entity)
    {
        $tableName = $this->getTableName();
        $sql = "UPDATE `{$tableName}` SET `count` = `count` - 1 WHERE id = :id";

        App::call()->db->execute($sql, ['id' => $entity->id]);
    }

    public function save(Model $entity)
    {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }
}
