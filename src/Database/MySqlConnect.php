<?php

namespace Basic\Database;

class MySqlConnect
{
    protected $where;
    protected $values;
    protected $sql = "";
    protected string $pluck =  "*";
    protected string $table;
    protected static $oDb;

    private static $self;


    public function __construct()
    {
        if (!self::$oDb) {
            $oDb = new \mysqli(
                'localhost',
                'root',
                '',
                'basic_php'
            );
            if ($oDb->connect_errno) {
                die("We could not connect to the database due to : " . $oDb->connect_error);
            }

            self::$oDb = $oDb;
        }
    }

    public static function connect()
    {
        if (!self::$self) {
            self::$self = new MySqlConnect();
        }
        return self::$self;
    }


    public function table($table)
    {
        $this->table = $table;

        return $this;
    }

    public function pluck($pluck)
    {
        $this->pluck = is_array($pluck) ? '"' . implode(",", $pluck) . '"' : $pluck;
        return $this;
    }

    public function buildWhereQuery($aWhere, $condition = "AND")
    {
        $aKeys = array_keys($aWhere);
        $this->where =  array_reduce($aKeys, function ($carry, $key) use ($aWhere, $condition) {
            $build = $key . "=" . '"' . $aWhere[$key] .'"';

            if (!$carry) {
                $carry = "{$build}";
            }else {
                $carry = "{$carry} {$condition} {$build}";
            }
            return $carry;            
        });
        return $this;
    }

    public function set($set)
    {
        $c = array();
        $keys = array_keys($set);
        for ($i = 0; $i < count($set); $i++) {
            $a = array();
            array_push($a, $keys[$i], '"' . $set[$keys[$i]] . '"');
            $b = implode(" = ", $a);
            array_push($c, $b);
        }
        $this->set = implode(" AND ", $c);
        return $this;
    }

    public function values($values)
    {
        $a = array();
        $b = array();
        $keys = array_keys($values);
        for ($i = 0; $i < count($values); $i++) {
            array_push($a,  $keys[$i]);
            array_push($b,  '"' . $values[$keys[$i]] . '"');
        }
        $this->tableCol = implode(", ", $a);
        $this->aValues = implode(", ", $b);
        return $this;
    }

    public function select()
    {
        $sql = "SELECT {$this->pluck} FROM $this->table";
        if (isset($this->where)) {
            $sql .= " WHERE $this->where";
            if (isset($this->where)) {
                $sql .= " OR $this->where";
            }
        }
        echo $sql;
        die;
        $this->query =  self::$oDb->query($sql);
        return $this->query;
    }

    public function insert()
    {
        $sql = "INSERT INTO $this->table ({$this->tableCol}) VALUES ({$this->aValues})";
        $this->query =  self::$oDb->query($sql);
        return $this->query;
    }

    public function update()
    {
        $sql = "UPDATE $this->table
            SET {$this->set}
            WHERE $this->where";
        if (isset($this->orWhere)) {
            $sql .= " OR $this->orWhere";
        }
        echo $sql;
        die;
        $this->query =  self::$oDb->query($sql);
        return $this->query;
    }

    public function delete()
    {
        $sql = "DELETE FROM $this->table
            WHERE $this->where";
        if (isset($this->orWhere)) {
            $sql .= " OR $this->orWhere";
        }
        echo $sql;
        die;
        $this->query =  self::$oDb->query($sql);
        return $this->query;
    }
}
