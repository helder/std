<?php
/**
 * Generated by Haxe 4.0.1
 */

namespace helder\std\php\_NativeArray;

use \helder\std\php\Boot;
use \helder\std\php\_NativeIndexedArray\NativeIndexedArrayIterator;

final class NativeArray_Impl_ {
	/**
	 * @return mixed
	 */
	static public function _new () {
		#/home/runner/haxe/versions/4.0.1/std/php/NativeArray.hx:33: character 2
		$this1 = [];
		return $this1;
	}

	/**
	 * @param mixed $this
	 * @param bool $key
	 * 
	 * @return mixed
	 */
	static public function getByBool ($this, $key) ;

	/**
	 * @param mixed $this
	 * @param float $key
	 * 
	 * @return mixed
	 */
	static public function getByFloat ($this, $key) ;

	/**
	 * @param mixed $this
	 * @param int $key
	 * 
	 * @return mixed
	 */
	static public function getByInt ($this, $key) ;

	/**
	 * @param mixed $this
	 * @param string $key
	 * 
	 * @return mixed
	 */
	static public function getByString ($this, $key) ;

	/**
	 * @param mixed $this
	 * 
	 * @return NativeIndexedArrayIterator
	 */
	static public function iterator ($this1) {
		#/home/runner/haxe/versions/4.0.1/std/php/NativeArray.hx:53: characters 10-46
		return new NativeIndexedArrayIterator(array_values($this1));
	}

	/**
	 * @param mixed $this
	 * 
	 * @return NativeArrayKeyValueIterator
	 */
	static public function keyValueIterator ($this1) {
		#/home/runner/haxe/versions/4.0.1/std/php/NativeArray.hx:56: characters 3-47
		return new NativeArrayKeyValueIterator($this1);
	}

	/**
	 * @param mixed $this
	 * @param bool $key
	 * @param mixed $val
	 * 
	 * @return mixed
	 */
	static public function setByBool ($this, $key, $val) ;

	/**
	 * @param mixed $this
	 * @param float $key
	 * @param mixed $val
	 * 
	 * @return mixed
	 */
	static public function setByFloat ($this, $key, $val) ;

	/**
	 * @param mixed $this
	 * @param int $key
	 * @param mixed $val
	 * 
	 * @return mixed
	 */
	static public function setByInt ($this, $key, $val) ;

	/**
	 * @param mixed $this
	 * @param string $key
	 * @param mixed $val
	 * 
	 * @return mixed
	 */
	static public function setByString ($this, $key, $val) ;
}

Boot::registerClass(NativeArray_Impl_::class, 'php._NativeArray.NativeArray_Impl_');
