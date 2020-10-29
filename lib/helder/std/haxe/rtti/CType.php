<?php
/**
 * Generated by Haxe 4.1.0
 */

namespace helder\std\haxe\rtti;

use \helder\std\php\Boot;
use \helder\std\Array_hx;
use \helder\std\php\_Boot\HxEnum;

/**
 * The runtime member types.
 */
class CType extends HxEnum {
	/**
	 * @param string $name
	 * @param Array_hx $params
	 * 
	 * @return CType
	 */
	static public function CAbstract ($name, $params) {
		return new CType('CAbstract', 7, [$name, $params]);
	}

	/**
	 * @param Array_hx $fields
	 * 
	 * @return CType
	 */
	static public function CAnonymous ($fields) {
		return new CType('CAnonymous', 5, [$fields]);
	}

	/**
	 * @param string $name
	 * @param Array_hx $params
	 * 
	 * @return CType
	 */
	static public function CClass ($name, $params) {
		return new CType('CClass', 2, [$name, $params]);
	}

	/**
	 * @param CType $t
	 * 
	 * @return CType
	 */
	static public function CDynamic ($t = null) {
		return new CType('CDynamic', 6, [$t]);
	}

	/**
	 * @param string $name
	 * @param Array_hx $params
	 * 
	 * @return CType
	 */
	static public function CEnum ($name, $params) {
		return new CType('CEnum', 1, [$name, $params]);
	}

	/**
	 * @param Array_hx $args
	 * @param CType $ret
	 * 
	 * @return CType
	 */
	static public function CFunction ($args, $ret) {
		return new CType('CFunction', 4, [$args, $ret]);
	}

	/**
	 * @param string $name
	 * @param Array_hx $params
	 * 
	 * @return CType
	 */
	static public function CTypedef ($name, $params) {
		return new CType('CTypedef', 3, [$name, $params]);
	}

	/**
	 * @return CType
	 */
	static public function CUnknown () {
		static $inst = null;
		if (!$inst) $inst = new CType('CUnknown', 0, []);
		return $inst;
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			7 => 'CAbstract',
			5 => 'CAnonymous',
			2 => 'CClass',
			6 => 'CDynamic',
			1 => 'CEnum',
			4 => 'CFunction',
			3 => 'CTypedef',
			0 => 'CUnknown',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'CAbstract' => 2,
			'CAnonymous' => 1,
			'CClass' => 2,
			'CDynamic' => 1,
			'CEnum' => 2,
			'CFunction' => 2,
			'CTypedef' => 2,
			'CUnknown' => 0,
		];
	}
}

Boot::registerClass(CType::class, 'haxe.rtti.CType');
