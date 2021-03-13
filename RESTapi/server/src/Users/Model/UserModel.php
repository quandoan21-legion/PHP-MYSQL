<?php 
namespace RESTapi\Users\Model;
use RESTapi\Database;


class UserModel
{
    private static string $tblName = ' users';

    public static function insert($aInfo){
        global $wpdb;

        return $wpdb->query(
            sprintf(
                "INSERT INTO %s VALUES(%s,%s,%s,%s)",
                self::$tblName, $aInfo['firstname'], $aInfo['lastname'], $aInfo['email'], md5($aInfo['password'])
            )
        );
    }

    public static function delete($userID){
        global $wpdb;

        return $wpdb->query(
            sprintf(
                "DELETE * FROM %s WHERE id=%d",
                self::$tblName, $userID
            )
        );
    }

    public static function getAll(): array {
        global $wpdb;

        $oResult = $wpdb->query("SELECT * FROM " . self::$tblName);

        if (!$oResult) {
            return [];
        }

        return $oResult->fetch_all(MYSQLI_ASSOC);

    }

    public static function getUser($username, $password): array {

        global $wpdb;
        $sql = ("SELECT * FROM " . self::$tblName . " where username = '" . $username. "' AND password = '" . $password ."'");
        $oResult = mysqli_fetch_all($wpdb->query($sql), MYSQLI_ASSOC);
        // var_export($oResult);die;

        if (!$oResult) {
            return[];
        }

        while ( $aRow = $oResult) {
            return $aRow;
        }

        return [];


    }
}
