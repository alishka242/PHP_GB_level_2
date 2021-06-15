<?php
namespace app\interfaces;

interface IModel
{
    public function getOne($id);
    public function getAll();
    public function insert($value1, $value2, $value3);
    public function update($value1, $value2, $value3, $value4, $value5, $id);
    public function delete($id);

}

