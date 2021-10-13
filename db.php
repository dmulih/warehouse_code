<?php
define('DBHOST', 'localhost'); // MySQL Database Host
define('DBUSERNAME', 'dollvvdq_root'); // MySQL Database Username
define('DBPASSWORD', 'jd2[~-6g^4CH'); // MySQL Database Password
define('DBNAME', 'dollvvdq_warehouse'); // MySQL Database Name
/* Database Connection */
$db = new mysqli(DBHOST,DBUSERNAME,DBPASSWORD,DBNAME);
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
/* Database Connection Class - better for functions and all */
class Database {
    private static $db;
    private $connection;
    private function __construct() {
        $this->connection = new MySQLi(DBHOST,DBUSERNAME,DBPASSWORD,DBNAME);
    }
    function __destruct() {
        $this->connection->close();
    }
    public static function getConnection() {
        if (self::$db == null) {
            self::$db = new Database();
        }
        return self::$db->connection;
    }
}
?>