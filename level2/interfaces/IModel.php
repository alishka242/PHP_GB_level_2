<?php
namespace app\interfaces;

interface IModel
{
    public static function getOne($id);
    public function getAll();
    public function insert();
    public function update();
    public function delete();
}