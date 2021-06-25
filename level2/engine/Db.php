<?php

namespace app\engine;

use app\traits\TSinletone;

class Db
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost:3306',
        'login' => 'root',
        'password' => 'Not.8fat',
        'database' => 'wild_shop',
        'charset' => 'utf8'
    ];

    use TSinletone;

    protected $connection = null;

    protected function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }

        return $this->connection;
    }

    protected function prepareDsnString()
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

    //внутренняя ф-ция для выполнения любого типа запроса, т.е. остальные ф-и будут пользоваться этой.
    private function query($sql, $params)
    {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function queryLimit($sql, $limit)
    {
        //LIMIT 0, $limit
        var_dump($sql, $limit);
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindValue(1, $limit, \PDO::PARAM_INT);
        //$stmt->execute($params);
        return []; //todo верни результат
    }

    public function queryOneObject($sql, $params, $class)
    {
        $stmt = $this->query($sql, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        return $stmt->fetch();
    }

    //ф-ния для получения одной записи
    public function queryOne($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    //ф-ния для получения массива записей
    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    //ф-ния для выполнений insert, update, delete
    public function execute($sql, $params = [])
    {
        return $this->query($sql, $params)->rowCount();
    }
}
