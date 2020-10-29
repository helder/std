<?php
/**
 * Generated by Haxe 4.1.0
 */

namespace helder\std\haxe\ds\_Map;

use \helder\std\php\Boot;
use \helder\std\haxe\ds\ObjectMap;
use \helder\std\haxe\ds\IntMap;
use \helder\std\haxe\IMap;
use \helder\std\haxe\ds\StringMap;
use \helder\std\haxe\ds\EnumValueMap;

final class Map_Impl_ {
	/**
	 * @param IMap $this
	 * @param mixed $k
	 * @param mixed $v
	 * 
	 * @return mixed
	 */
	public static function arrayWrite ($this1, $k, $v) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:165: characters 3-17
		$this1->set($k, $v);
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:166: characters 3-11
		return $v;
	}

	/**
	 * Removes all keys from `this` Map.
	 * 
	 * @param IMap $this
	 * 
	 * @return void
	 */
	public static function clear ($this1) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:161: characters 3-15
		$this1->clear();
	}

	/**
	 * Returns a shallow copy of `this` map.
	 * The order of values is undefined.
	 * 
	 * @param IMap $this
	 * 
	 * @return IMap
	 */
	public static function copy ($this1) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:145: characters 3-26
		return $this1->copy();
	}

	/**
	 * Returns true if `key` has a mapping, false otherwise.
	 * If `key` is `null`, the result is unspecified.
	 * 
	 * @param IMap $this
	 * @param mixed $key
	 * 
	 * @return bool
	 */
	public static function exists ($this1, $key) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:101: characters 3-26
		return $this1->exists($key);
	}

	/**
	 * @param IntMap $map
	 * 
	 * @return IntMap
	 */
	public static function fromIntMap ($map) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:190: characters 3-18
		return $map;
	}

	/**
	 * @param ObjectMap $map
	 * 
	 * @return ObjectMap
	 */
	public static function fromObjectMap ($map) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:194: characters 3-18
		return $map;
	}

	/**
	 * @param StringMap $map
	 * 
	 * @return StringMap
	 */
	public static function fromStringMap ($map) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:186: characters 3-18
		return $map;
	}

	/**
	 * Returns the current mapping of `key`.
	 * If no such mapping exists, `null` is returned.
	 * Note that a check like `map.get(key) == null` can hold for two reasons:
	 * 1. the map has no mapping for `key`
	 * 2. the map has a mapping with a value of `null`
	 * If it is important to distinguish these cases, `exists()` should be
	 * used.
	 * If `key` is `null`, the result is unspecified.
	 * 
	 * @param IMap $this
	 * @param mixed $key
	 * 
	 * @return mixed
	 */
	public static function get ($this1, $key) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:93: characters 3-23
		return $this1->get($key);
	}

	/**
	 * Returns an Iterator over the values of `this` Map.
	 * The order of values is undefined.
	 * 
	 * @param IMap $this
	 * 
	 * @return object
	 */
	public static function iterator ($this1) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:127: characters 3-25
		return $this1->iterator();
	}

	/**
	 * Returns an Iterator over the keys and values of `this` Map.
	 * The order of values is undefined.
	 * 
	 * @param IMap $this
	 * 
	 * @return object
	 */
	public static function keyValueIterator ($this1) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:136: characters 3-33
		return $this1->keyValueIterator();
	}

	/**
	 * Returns an Iterator over the keys of `this` Map.
	 * The order of keys is undefined.
	 * 
	 * @param IMap $this
	 * 
	 * @return object
	 */
	public static function keys ($this1) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:118: characters 3-21
		return $this1->keys();
	}

	/**
	 * Removes the mapping of `key` and returns true if such a mapping existed,
	 * false otherwise.
	 * If `key` is `null`, the result is unspecified.
	 * 
	 * @param IMap $this
	 * @param mixed $key
	 * 
	 * @return bool
	 */
	public static function remove ($this1, $key) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:110: characters 3-26
		return $this1->remove($key);
	}

	/**
	 * Maps `key` to `value`.
	 * If `key` already has a mapping, the previous value disappears.
	 * If `key` is `null`, the result is unspecified.
	 * 
	 * @param IMap $this
	 * @param mixed $key
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public static function set ($this1, $key, $value) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:75: characters 3-23
		$this1->set($key, $value);
	}

	/**
	 * @param IMap $t
	 * 
	 * @return EnumValueMap
	 */
	public static function toEnumValueMapMap ($t) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:178: characters 3-34
		return new EnumValueMap();
	}

	/**
	 * @param IMap $t
	 * 
	 * @return IntMap
	 */
	public static function toIntMap ($t) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:174: characters 3-25
		return new IntMap();
	}

	/**
	 * @param IMap $t
	 * 
	 * @return ObjectMap
	 */
	public static function toObjectMap ($t) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:182: characters 3-31
		return new ObjectMap();
	}

	/**
	 * Returns a String representation of `this` Map.
	 * The exact representation depends on the platform and key-type.
	 * 
	 * @param IMap $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:154: characters 3-25
		return $this1->toString();
	}

	/**
	 * @param IMap $t
	 * 
	 * @return StringMap
	 */
	public static function toStringMap ($t) {
		#/home/runner/haxe/versions/4.1.0/std/haxe/ds/Map.hx:170: characters 3-28
		return new StringMap();
	}
}

Boot::registerClass(Map_Impl_::class, 'haxe.ds._Map.Map_Impl_');
