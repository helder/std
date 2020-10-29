<?php
/**
 * Generated by Haxe 4.0.2
 */

namespace helder\std\sys\_FileSystem;

use \helder\std\php\Boot;
use \helder\std\php\_Boot\HxEnum;

class FileKind extends HxEnum {
	/**
	 * @return FileKind
	 */
	static public function kdir () {
		static $inst = null;
		if (!$inst) $inst = new FileKind('kdir', 0, []);
		return $inst;
	}

	/**
	 * @return FileKind
	 */
	static public function kfile () {
		static $inst = null;
		if (!$inst) $inst = new FileKind('kfile', 1, []);
		return $inst;
	}

	/**
	 * @param string $k
	 * 
	 * @return FileKind
	 */
	static public function kother ($k) {
		return new FileKind('kother', 2, [$k]);
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			0 => 'kdir',
			1 => 'kfile',
			2 => 'kother',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'kdir' => 0,
			'kfile' => 0,
			'kother' => 1,
		];
	}
}

Boot::registerClass(FileKind::class, 'sys._FileSystem.FileKind');
