<?php
date_default_timezone_set('Asia/Taipei');
session_start();
function dd($ary)
{
    echo "<pre>";
    print_r($ary);
    echo "</pre>";
}
function to($url)
{
    header("location:$url");
}
class DB
{
    //3
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db03s";
    protected $pdo;
    //construct
    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }
    //3
    private function a2s($ary)
    {
        foreach ($ary as $col => $val) {
            $tmp[] = "`$col` = '$val'";
        }
        return $tmp;
    }
    private function sql_all($sql, $where, $other)
    {
        if (is_array($where)) {
            $sql .= " where " . join(" && ", $this->a2s($where));
        } else {
            $sql .= " $where";
        }
        $sql .= " $other";
        return $sql;
    }
    private function math($math, $col, $where = '', $other = '')
    {
        $sql = "select $math(`$col`) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col, $where = '', $other = '')
    {
        return $this->math('sum', $col, $where, $other);
    }
    function max($col, $where = '', $other = '')
    {
        return $this->math('max', $col, $where, $other);
    }
    function min($col, $where = '', $other = '')
    {
        return $this->math('min', $col, $where, $other);
    }
    function all($where = '', $other = '')
    {
        $sql = "select * from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function count($where = '', $other = '')
    {
        $sql = "select count(*) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function save($array)
    {
        if (isset($array['id'])) {
            $sql = "update `$this->table` set ";
            $sql .= join(",", $this->a2s($array));
            $sql .= " where `id`='{$array['id']}'";
        } else {
            $sql = "insert into `$this->table` ";
            $col = "`" . join("`,`", array_keys($array)) . "`";
            $val = "'" . join("','", $array) . "'";
            $sql .= "($col) values ($val)";
        }
        return $this->pdo->exec($sql);
    }
    function find($id)
    {
        $sql = "select * from `$this->table` ";
        if (is_array($id)) {
            $sql .= " where " . join(" && ", $this->a2s($id));
        } elseif (is_numeric($id)) {
            $sql .= " where `id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id)
    {
        $sql = "delete from `$this->table` ";
        if (is_array($id)) {
            $sql .= " where " . join(" && ", $this->a2s($id));
        } elseif (is_numeric($id)) {
            $sql .= " where `id`='$id'";
        }
        return $this->pdo->exec($sql);
    }
    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
$Poster = new DB('poster');
$Movie = new DB('movie');
$Order = new DB('orders');

$level = [
    1 => "普遍級",
    2 => "保護級",
    3 => "輔導級",
    4 => "限制級",
];
$sess = [
    "14:00~16:00",
    "16:00~18:00",
    "18:00~20:00",
    "20:00~22:00",
    "22:00~24:00",
];
