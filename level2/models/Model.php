<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    protected $db;

    abstract protected function getTableName();

    public function __construct(Db $db)
    {
        $this->db = $db;
    }


    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";

        echo $this->db->queryOne($sql);
    }
    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";

        echo $this->db->queryAll($sql);
    }

    // нужно еще подумать над реализацией другиз таблиц, ведь колонки будут разные. 
    public function insert($value1, $value2, $value3)
    {
        $sql = "INSERT INTO {$this->getTableName()} (id, `login`, pass) VALUES ($value1, '{$value2}', '{$value3}')";

        echo $this->db->executeQuery($sql);
    }

    // нужно еще подумать над реализацией другиз таблиц, ведь колонки будут разные. 
    public function update($value1, $value2, $value3, $value4, $value5, $id)
    {
        $sql = "UPDATE {$this->getTableName()} SET ($value1, {$value2}, '{$value3}', {$value4}, {$value5}) WHERE id = {$id}";

        echo $this->db->executeQuery($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = {$id}";

        echo $this->db->executeQuery($sql);
    }
}
