<?php
namespace core\libs;
use core\libs\conf;

class log {
	static $class;


	static public function init() {
		// 确定存储方式
		$drive = conf::get('DRIVE', 'log');
		$class = '\core\libs\drive\log\\' . $drive;
		self::$class = new $class;
	}

	static public function log($msg, $file = 'log') {
		/**
		 * 1.确定日志存储方式
		 *
		 * 2.写日志
		 */
		self::$class->log($msg, $file);
	}
}

?>