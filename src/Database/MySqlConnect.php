<?php
namespace Basic\Database;

use function Symfony\Component\DependencyInjection\Loader\Configurator\param;
use Basic\Database\ContructDatabase as ContructDatabase;
use Basic\Database\ContructUsersTable as ContructUsersTable;
use Basic\Database\ContructPostsTable as ContructPostsTable;
use Basic\Core\App as App;

class MySqlConnect
{
    protected $where;
    protected $values;
    protected $sql = "";
    protected string $pluck =  "*";
    protected string $table;
    public static $oDb;

    private static $self;


    public function __construct()
    {
        ContructDatabase::createDatabase();
        if (!self::$oDb) {
            $oDb = new \mysqli(
                App::get('configs/database')['host'],
                App::get('configs/database')['username'],
                App::get('configs/database')['password'],
                App::get('configs/database')['db'],
            );
            self::$oDb = $oDb;
            ContructUsersTable::createUsersTable();
            ContructPostsTable::createPostsTable();
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

    public function where($aWhere, $condition = "AND")
    {
        $aKeys = array_keys($aWhere);
        $this->where =  array_reduce($aKeys, function ($carry, $key) use ($aWhere, $condition) {
            $build = $key . " = " . '"' . $aWhere[$key] . '"';
            if (!$carry) {
                $carry = "{$build}";
            } else {
                $carry = "{$carry} {$condition} {$build}";
            }
            return $carry;
        });
        return $this;
    }

    public function orWhere($aOrWhere, $condition = "AND")
    {
        $aKeys = array_keys($aOrWhere);
        $this->orWhere = array_reduce($aKeys, function ($carry, $key) use ($aOrWhere, $condition) {
            $build = $key . " = " . '"' . $aOrWhere[$key] . '"';

            if (!$carry) {
                $carry = "{$build}";
            } else {
                $carry = "{$carry} {$condition} {$build}";
            }
            return $carry;
        });
        return $this;
    }

    public function set($aSet)
    {
        $aKeys = array_keys($aSet);
        $this->set = array_reduce($aKeys, function ($carry, $key) use ($aSet) {
            $build = $key . " = " . '"' . $aSet[$key] . '"';
            if (!$carry) {
                $carry = "{$build}";
            } else {
                $carry = "{$carry} , {$build}";
            }
            return $carry;
        });
        return $this;
    }

    public function values($aValues)
    {
        $aKeys = array_keys($aValues);
        $this->tableCol = implode(", ", $aKeys);
        $this->aValues = array_reduce($aKeys, function ($carry, $key) use ($aValues) {
            $build = '"' . $aValues[$key] . '"';
            if (!$carry) {
                $carry = "{$build}";
            } else {
                $carry = "{$carry} , {$build}";
            }
            return $carry;
        });
        return $this;
    }


    public function select()
    {
        $sql = "SELECT {$this->pluck} FROM $this->table";
        if (isset($this->where)) {
            $sql .= " WHERE $this->where";
            if (isset($this->orWhere)) {
                $sql .= " OR $this->orWhere";
            }
        }
        $result = mysqli_fetch_all(self::$oDb->query($sql));
        return $result;
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
