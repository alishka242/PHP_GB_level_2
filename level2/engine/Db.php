<?php

namespace app\engine;

class Db
{

    public function queryOne($sql) {
        return $sql . "<br>";
    }

    public function queryAll($sql) {
        return $sql . "<br>";
    }

    public function executeQuery($sql) {
        return $sql . "<br>";
    }
}