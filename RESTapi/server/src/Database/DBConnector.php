<?php

namespace Basic\Database;

class DBConnector
{
    private static $oSelf = null;
    public \mysqli $oDB;
    
    public function __construct()
    {
        $host     = getenv("DB_HOST");
        $port     = getenv("DB_PORT");
        $db       = getenv("DB_DATABASE");
        $username = getenv("DB_USERNAME");
        $password = getenv("DB_PASSWORD");

        try {
            $this->oDB = new \mysqli(
                $host,
                $port,
                $db,
                $username,
                $password,
            );
        }

        catch (\Exception $oException) {
            exit($oException->getMessage());
        }
    }

    public static function connect(): ?DBConnector {
        if (self::$oSelf === null) {
            self::$oSelf = new self();
        }

        return self::$oSelf;
    }
}
