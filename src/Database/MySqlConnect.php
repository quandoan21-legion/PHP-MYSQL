<?php

namespace Basic\Database;

class MySqlConnect
{
    protected $where;
    protected string $pluck =  "*";
    protected string $table;
    protected string $oDb;

    private static $self;

    public function __construct()
    {
        if (!self::$oDb) {
            $oDb = new \mysqli(
                host: 'localhost',
                username: 'root',
                passwd: '',
                dbname: 'basic_php'
            );
            if ($oDb->connect_errno) {
                die("We could not connect to the database due to : " . $oDb->connect_errno);
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

    public function where($where)
    {
        $this->where =  $where;

        return $this;
    }

    public function select($sql)
    {
        $sql = "SELECT {$this->what} FROM $this->table";

        if ($this->where) {
            $sql .= " WHERE $this->where";
        }

        // ...
    }
}


