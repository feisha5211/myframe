<?php
namespace core\libs;
use core\libs\conf;

class model extends \PDO {
    public function __construct() {
        $mysql_conf = conf::get('mysql', 'db');
        $host = $mysql_conf['host'];
        $username = $mysql_conf['username'];
        $passwd = $mysql_conf['passwd'];
        $db_name = $mysql_conf['db_name'];

        $dsn = 'mysql:host='.$host.';dbname='.$db_name;
        try{
            parent::__construct($dsn, $username, $passwd);
        } catch (\PDOException $e) {
            p($e->getMessage());
        }
    }
}
