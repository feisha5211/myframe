<?php
namespace core\libs;
class conf {
    static $conf = array();

    /**
     * 获取配置文件某一配置项
     *
     * @param $name   配置项名称
     * @param $file   配置文件
     * @return mixed  配置
     * @throws \Exception
     *
     * @author 王文韬
     */
    static public function get($name, $file) {
        /**
         * 1 判断配置文件是否存在
         * 2 判断配置是否存在
         * 3 缓存配置
         */
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            $path = FEISHA . '\core\configs\\' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return self::$conf[$file][$name];
                } else {
                    throw new \Exception('配置项不存在' . $name);
                }
            } else {
                throw new \Exception('配置文件不存在' . $file);
            }
        }

    }

    /**
     * 获取配置文件所有配置项
     *
     * @param $file   配置文件名称
     * @return mixed  配置文件内容
     * @throws \Exception
     *
     * @author 王文韬
     */
    static public function all($file) {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file];
        } else {
            $path = FEISHA . '/core/configs/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                self::$conf[$file] = $conf;

                return self::$conf[$file];
            } else {
                throw new \Exception('配置文件不存在');
            }
        }
    }
}
?>