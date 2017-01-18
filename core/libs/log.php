<?php
namespace core\libs;
use core\libs\conf;

class log {
	static $class;
	static $_inst;

	static public function init($mode = '') {
		// 确定存储方式
		$drive = conf::get('DRIVE', 'log');
		$class = '\core\libs\drive\log\\' . $drive;
		self::$class = new $class($mode);
	}

	static public function log($msg, $file = 'log', $mode = '') {
		/**
		 * 1.确定日志存储方式
		 *
		 * 2.写日志
		 */
		self::$class->log($msg, $file, $mode);
	}
}

?>