<?php
namespace app\controller;

class IndexController {
    public function index() {
        echo 'this is IndexController index_action';
        $model = new \core\libs\model();
        $sql = "SELECT * from users";
        $rows = $model->query($sql);
        p($rows->fetchAll(\PDO::FETCH_ASSOC));
    }
}