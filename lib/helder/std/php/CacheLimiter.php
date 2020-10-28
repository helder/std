<?php
/**
 * Generated by Haxe 4.1.3
 */

namespace helder\std\php;

use \helder\std\php\_Boot\HxEnum;

class CacheLimiter extends HxEnum {
	/**
	 * @return CacheLimiter
	 */
	static public function NoCache () {
		static $inst = null;
		if (!$inst) $inst = new CacheLimiter('NoCache', 2, []);
		return $inst;
	}

	/**
	 * @return CacheLimiter
	 */
	static public function Private () {
		static $inst = null;
		if (!$inst) $inst = new CacheLimiter('Private', 1, []);
		return $inst;
	}

	/**
	 * @return CacheLimiter
	 */
	static public function PrivateNoExpire () {
		static $inst = null;
		if (!$inst) $inst = new CacheLimiter('PrivateNoExpire', 3, []);
		return $inst;
	}

	/**
	 * @return CacheLimiter
	 */
	static public function Public () {
		static $inst = null;
		if (!$inst) $inst = new CacheLimiter('Public', 0, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			2 => 'NoCache',
			1 => 'Private',
			3 => 'PrivateNoExpire',
			0 => 'Public',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'NoCache' => 0,
			'Private' => 0,
			'PrivateNoExpire' => 0,
			'Public' => 0,
		];
	}
}

Boot::registerClass(CacheLimiter::class, 'php.CacheLimiter');
