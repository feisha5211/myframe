<?php
namespace core\libs;

class model extends \PDO {
    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=test';
        $username = 'root';
        $passwd = 'r1oot';
        try{
            parent::__construct($dsn, $username, $passwd);
        } catch (\PDOException $e) {
            p($e->getMessage());
        }
    }
}
