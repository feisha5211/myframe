<?php
namespace app\controller;

class IndexController extends \core\feisha{
    public function index() {
	    $log = new \core\libs\log;
	    $log::init();
	    $log::log('test', 'test');
	    $log::log($_SERVER, 'abc');

        echo 'this is IndexController index_action';
        $model = new \core\libs\model();
        $sql = "SELECT * from users";
        $rows = $model->query($sql);
        p($rows->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function view() {
        $title = '这是标题';
        $h1 = '我的框架,听我的';
        $this->assign('title', $title);
        $this->assign('h1', $h1);
        $this->display('index.html');
    }
}