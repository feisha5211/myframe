<?php
namespace core\libs;
use core\libs\conf;

class route {
    public $controller;
    public $action;

    public function __construct() {
        // xxx.com/index/index
        /*
         * 1.隐藏index.php
         * 2.获取URL 获取参数
         * 3.返回对应控制器和方法
         */
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
	        $path = strstr($_SERVER['REQUEST_URI'], 'index');
            $path_arr = explode('/', trim($path, '/'));
            if (!empty($path_arr[0])) {
                $this->controller = $path_arr[0];
            }
            if (!empty($path_arr[1])) {
                $this->action = $path_arr[1];
            } else {
                $this->action = conf::get('action', 'route');
            }

            // url多余部分参数处理
            //id/1/s/2
            $count = count($path_arr) + 2;
            for ($i=2; $i<$count; $i+=2) {
                if (isset($path_arr[$i+1])) {
                    $_GET[$path_arr[$i]] = $path_arr[$i+1];
                }
            }

        } else {
            $this->controller = conf::get('action', 'route');
            $this->action = conf::get('action', 'route');
        }
    }

}
