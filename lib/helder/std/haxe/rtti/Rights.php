<?php
/**
 * Generated by Haxe 4.0.2
 */

namespace helder\std\haxe\rtti;

use \helder\std\php\Boot;
use \helder\std\php\_Boot\HxEnum;

/**
 * Represents the runtime rights of a type.
 */
class Rights extends HxEnum {
	/**
	 * @param string $m
	 * 
	 * @return Rights
	 */
	static public function RCall ($m) {
		return new Rights('RCall', 2, [$m]);
	}

	/**
	 * @return Rights
	 */
	static public function RDynamic () {
		static $inst = null;
		if (!$inst) $inst = new Rights('RDynamic', 4, []);
		return $inst;
	}

	/**
	 * @return Rights
	 */
	static public function RInline () {
		static $inst = null;
		if (!$inst) $inst = new Rights('RInline', 5, []);
		return $inst;
	}

	/**
	 * @return Rights
	 */
	static public function RMethod () {
		static $inst = null;
		if (!$inst) $inst = new Rights('RMethod', 3, []);
		return $inst;
	}

	/**
	 * @return Rights
	 */
	static public function RNo () {
		static $inst = null;
		if (!$inst) $inst = new Rights('RNo', 1, []);
		return $inst;
	}

	/**
	 * @return Rights
	 */
	static public function RNormal () {
		static $inst = null;
		if (!$inst) $inst = new Rights('RNormal', 0, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			2 => 'RCall',
			4 => 'RDynamic',
			5 => 'RInline',
			3 => 'RMethod',
			1 => 'RNo',
			0 => 'RNormal',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'RCall' => 1,
			'RDynamic' => 0,
			'RInline' => 0,
			'RMethod' => 0,
			'RNo' => 0,
			'RNormal' => 0,
		];
	}
}

Boot::registerClass(Rights::class, 'haxe.rtti.Rights');
