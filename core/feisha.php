<?php
namespace core;

use Think\Exception;

class feisha {
    public static $classMap = array();
    public $assign;

    static public function run() {
        $route = new \core\libs\route();
        $controller = ucfirst($route->controller);
        $action = $route->action;
        $controller_file = APP.'/controller/'.$controller.'Controller.php';
        $ctrl_class = "\\".MODULE."\\controller\\".$controller.'Controller';
        if (is_file($controller_file)) {
            include $controller_file;
            $ctrl = new $ctrl_class();
            $ctrl->$action();
        } else {
            throw new Exception('找不到控制器'.$controller);
        }
    }

    static public function load($class) {
        // 类自动加载
        // new \core\route();
        // $class = '\core\route';
        // FEISHA.'/core/route.php';
        if (isset(self::$classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = FEISHA.'/'.$class.'.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($key, $value) {
        $this->assign[$key] = $value;
    }

    public function display($file) {
        $view_file = APP . '/views/' . $file;
        if (is_file($view_file)) {
            extract($this->assign);
            include $view_file;
        } else {
            throw new Exception('视图文件' . $view_file . '不存在');
        }
    }
}
