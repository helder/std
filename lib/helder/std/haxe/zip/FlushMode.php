<?php
/**
 * Generated by Haxe 4.0.1
 */

namespace helder\std\haxe\zip;

use \helder\std\php\Boot;
use \helder\std\php\_Boot\HxEnum;

class FlushMode extends HxEnum {
	/**
	 * @return FlushMode
	 */
	static public function BLOCK () {
		static $inst = null;
		if (!$inst) $inst = new FlushMode('BLOCK', 4, []);
		return $inst;
	}

	/**
	 * @return FlushMode
	 */
	static public function FINISH () {
		static $inst = null;
		if (!$inst) $inst = new FlushMode('FINISH', 3, []);
		return $inst;
	}

	/**
	 * @return FlushMode
	 */
	static public function FULL () {
		static $inst = null;
		if (!$inst) $inst = new FlushMode('FULL', 2, []);
		return $inst;
	}

	/**
	 * @return FlushMode
	 */
	static public function NO () {
		static $inst = null;
		if (!$inst) $inst = new FlushMode('NO', 0, []);
		return $inst;
	}

	/**
	 * @return FlushMode
	 */
	static public function SYNC () {
		static $inst = null;
		if (!$inst) $inst = new FlushMode('SYNC', 1, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			4 => 'BLOCK',
			3 => 'FINISH',
			2 => 'FULL',
			0 => 'NO',
			1 => 'SYNC',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'BLOCK' => 0,
			'FINISH' => 0,
			'FULL' => 0,
			'NO' => 0,
			'SYNC' => 0,
		];
	}
}

Boot::registerClass(FlushMode::class, 'haxe.zip.FlushMode');
