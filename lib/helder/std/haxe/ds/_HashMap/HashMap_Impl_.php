<?php
/**
 * Generated by Haxe 4.0.1
 */

namespace helder\std\haxe\ds\_HashMap;

use \helder\std\php\Boot;
use \helder\std\php\_NativeIndexedArray\NativeIndexedArrayIterator;

final class HashMap_Impl_ {
	/**
	 * Creates a new HashMap.
	 * 
	 * @return HashMapData
	 */
	static public function _new () {
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:36: character 2
		$this1 = new HashMapData();
		return $this1;
	}

	/**
	 * See `Map.clear`
	 * 
	 * @param HashMapData $this
	 * 
	 * @return void
	 */
	static public function clear ($this1) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:98: characters 3-20
		$_this = $this1->keys;
		$this2 = [];
		$_this->data = $this2;

		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:99: characters 3-22
		$_this1 = $this1->values;
		$this3 = [];
		$_this1->data = $this3;

	}

	/**
	 * See `Map.copy`
	 * 
	 * @param HashMapData $this
	 * 
	 * @return HashMapData
	 */
	static public function copy ($this1) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:81: characters 3-34
		$copied = new HashMapData();
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:82: characters 3-33
		$copied->keys = (clone $this1->keys);
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:83: characters 3-37
		$copied->values = (clone $this1->values);
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:84: characters 3-21
		return $copied;
	}

	/**
	 * See `Map.exists`
	 * 
	 * @param HashMapData $this
	 * @param mixed $k
	 * 
	 * @return bool
	 */
	static public function exists ($this1, $k) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:59: characters 10-42
		$_this = $this1->values;
		return array_key_exists($k->hashCode(), $_this->data);
	}

	/**
	 * See `Map.get`
	 * 
	 * @param HashMapData $this
	 * @param mixed $k
	 * 
	 * @return mixed
	 */
	static public function get ($this1, $k) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:52: characters 10-39
		$_this = $this1->values;
		$key = $k->hashCode();
		return ($_this->data[$key] ?? null);
	}

	/**
	 * See `Map.iterator`
	 * 
	 * @param HashMapData $this
	 * 
	 * @return object
	 */
	static public function iterator ($this1) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:91: characters 10-32
		return new NativeIndexedArrayIterator(array_values($this1->values->data));
	}

	/**
	 * See `Map.keys`
	 * 
	 * @param HashMapData $this
	 * 
	 * @return object
	 */
	static public function keys ($this1) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:74: characters 10-30
		return new NativeIndexedArrayIterator(array_values($this1->keys->data));
	}

	/**
	 * See `Map.remove`
	 * 
	 * @param HashMapData $this
	 * @param mixed $k
	 * 
	 * @return bool
	 */
	static public function remove ($this1, $k) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:66: characters 3-35
		$this1->values->remove($k->hashCode());
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:67: characters 3-40
		return $this1->keys->remove($k->hashCode());
	}

	/**
	 * See `Map.set`
	 * 
	 * @param HashMapData $this
	 * @param mixed $k
	 * @param mixed $v
	 * 
	 * @return void
	 */
	static public function set ($this1, $k, $v) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:44: characters 3-33
		$_this = $this1->keys;
		$key = $k->hashCode();
		$_this->data[$key] = $k;

		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/HashMap.hx:45: characters 3-35
		$_this1 = $this1->values;
		$key1 = $k->hashCode();
		$_this1->data[$key1] = $v;

	}
}

Boot::registerClass(HashMap_Impl_::class, 'haxe.ds._HashMap.HashMap_Impl_');
