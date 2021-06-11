<?php
class Db {
    protected $tableName;
    protected $wheres = [];

    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        if(!empty($this->wheres)){
            $sql .= " WHERE ";
            foreach ($this->wheres as $value){
                $sql .= $value['column'] . " = " . $value['value'];
                if ($value != end($this->wheres)) $sql .= " AND ";
            }
        }
        $this->wheres = [];
        return $sql . PHP_EOL;
    }

    public function getOne($id)
    {
        return "SELECT * FROM {$this->tableName} WHERE id = {$id}" . PHP_EOL;      
    }

    public function where($column, $value)
    {
        $this->wheres[] = [
            'column' => $column,
            'value' => $value,
        ];
        return $this;
    }

    public function andWhere($column, $value)
    {
        return $this->where($column, $value);
    }
}

$db = new Db();
echo $db->table('products')->getAll();
echo "<br>";
echo $db->table('users')->getOne(5);
echo "<br>";
echo $db->table('users')->where('name', 'admin')->getAll();
echo "<br>";
echo $db->table('users')->where('name', 'чай')->where('price', 12)->getAll();
echo "<br>";
echo $db->table('users')->where('name', 'admin')->andWhere('pass', 123)->getAll();
echo "<br>";
echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->getAll();