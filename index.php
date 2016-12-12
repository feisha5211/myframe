<?php
    /**
     * 入口文件
     * 1.定义常量
     * 2.加载函数库
     * 3.启动框架
     */

    define('FEISHA', realpath('./'));
    define('CORE', FEISHA.'/core');
    define('APP', FEISHA.'/app');
    define('MODULE', 'app');
    define('DEBUG', true);

    if (DEBUG) {
        ini_set('display_errors', 'On');
    } else {
        ini_set('display_errors', 'Off');
    }

    include CORE.'/common/function.php';
    include CORE.'/feisha.php';

    spl_autoload_register('\core\feisha::load');
    
    \core\feisha::run();
