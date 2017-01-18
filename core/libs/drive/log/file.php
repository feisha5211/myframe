<?php
namespace core\libs\drive\log;
use core\libs\conf;
 // 文件系统

class file {
	public $path; #日志存储路径
	public $mode; #日志记录模式

	public function __construct($mode) {
		$this->path = conf::get('OPTION', 'log')['path'];
		$this->mode = $mode;
	}

	/**
	 * 1.确定日志存储方式
	 *
	 * 2.写日志
	 */
	public function log($msg, $file = 'log') {
		switch ($this->mode){
			case 'hour':
				$log_path = date('Ymd_H');
				break;
			case 'day':
				$log_path = date('Ymd');
				break;
			case 'month':
				$log_path = date('Ym');
				break;
			default:
				$log_path = '';
				break;
		}

		$log_path = empty($log_path) ? $this->path : $this->path . '\\' . $log_path;

		if (!is_dir($log_path)) {
			mkdir($log_path, 0777, true);
		}
		$msg = date('Y-m-d H:i:s') . ' ' . json_encode($msg) . PHP_EOL;
		$log_file = $log_path . '\\' . $file . '.php';
		error_log($msg, 3, $log_file);
	}
}