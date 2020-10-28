<?php
/**
 * Generated by Haxe 4.0.2
 */

namespace helder\std\php\_NativeIndexedArray;

use \helder\std\php\_Boot\HxAnon;
use \helder\std\php\Boot;

class NativeIndexedArrayKeyValueIterator {
	/**
	 * @var int
	 */
	public $current;
	/**
	 * @var mixed
	 */
	public $data;
	/**
	 * @var int
	 */
	public $length;

	/**
	 * @param mixed $data
	 * 
	 * @return void
	 */
	public function __construct ($data) {
		#/home/runner/haxe/versions/4.0.2/std/php/NativeIndexedArray.hx:82: characters 20-21
		$this->current = 0;
		#/home/runner/haxe/versions/4.0.2/std/php/NativeIndexedArray.hx:86: characters 3-30
		$this->length = count($data);
		#/home/runner/haxe/versions/4.0.2/std/php/NativeIndexedArray.hx:87: characters 3-19
		$this->data = $data;
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#/home/runner/haxe/versions/4.0.2/std/php/NativeIndexedArray.hx:91: characters 3-26
		return $this->current < $this->length;
	}

	/**
	 * @return object
	 */
	public function next () {
		#/home/runner/haxe/versions/4.0.2/std/php/NativeIndexedArray.hx:95: characters 16-23
		$tmp = $this->current;
		#/home/runner/haxe/versions/4.0.2/std/php/NativeIndexedArray.hx:95: characters 3-48
		return new HxAnon([
			"key" => $tmp,
			"value" => $this->data[$this->current++],
		]);
	}
}

Boot::registerClass(NativeIndexedArrayKeyValueIterator::class, 'php._NativeIndexedArray.NativeIndexedArrayKeyValueIterator');
