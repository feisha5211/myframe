<?php
namespace core\libs\drive\log;
use core\libs\conf;
 // 文件系统

class file {
	public $path; #日志存储路径

	public function __construct() {
		$this->path = conf::get('OPTION', 'log')['path'];
	}

	/**
	 * 1.确定日志存储方式
	 *
	 * 2.写日志
	 */
	public function log($msg, $file = 'log') {
		if (!is_dir($this->path)) {
			mkdir($this->path, 0777, true);
		}
		$msg = date('Y-m-d H:i:s') . ' ' . json_encode($msg) . PHP_EOL;
		$log_file = $this->path . '\\' . $file . '.php';
		error_log($msg, 3, $log_file);
	}
}