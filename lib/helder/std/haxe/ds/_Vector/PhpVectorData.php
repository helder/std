<?php
/**
 * Generated by Haxe 4.0.0+ef18b627e
 */

namespace helder\std\haxe\ds\_Vector;

use \helder\std\php\Boot;

class PhpVectorData {
	/**
	 * @var mixed
	 */
	public $data;
	/**
	 * @var int
	 */
	public $length;

	/**
	 * @param int $length
	 * 
	 * @return void
	 */
	public function __construct ($length) {
		#/home/runner/haxe/versions/4.0.0/std/php/_std/haxe/ds/Vector.hx:32: characters 3-23
		$this->length = $length;
		#/home/runner/haxe/versions/4.0.0/std/php/_std/haxe/ds/Vector.hx:33: characters 10-34
		$this1 = [];
		#/home/runner/haxe/versions/4.0.0/std/php/_std/haxe/ds/Vector.hx:33: characters 3-34
		$this->data = $this1;
	}
}

Boot::registerClass(PhpVectorData::class, 'haxe.ds._Vector.PhpVectorData');
