<?php
/**
 * Generated by Haxe 4.2.0
 */

namespace helder\std\haxe\iterators;

use \helder\std\php\_Boot\HxAnon;
use \helder\std\php\Boot;
use \helder\std\haxe\ds\_HashMap\HashMapData;
use \helder\std\php\_NativeIndexedArray\NativeIndexedArrayIterator;

class HashMapKeyValueIterator {
	/**
	 * @var object
	 */
	public $keys;
	/**
	 * @var HashMapData
	 */
	public $map;

	/**
	 * @param HashMapData $map
	 * 
	 * @return void
	 */
	public function __construct ($map) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/iterators/HashMapKeyValueIterator.hx:10: characters 3-17
		$this->map = $map;
		#/home/runner/haxe/versions/4.2.0/std/haxe/iterators/HashMapKeyValueIterator.hx:11: characters 3-25
		$this->keys = new NativeIndexedArrayIterator(\array_values($map->keys->data));
	}

	/**
	 * See `Iterator.hasNext`
	 * 
	 * @return bool
	 */
	public function hasNext () {
		#/home/runner/haxe/versions/4.2.0/std/haxe/iterators/HashMapKeyValueIterator.hx:18: characters 3-24
		return $this->keys->hasNext();
	}

	/**
	 * See `Iterator.next`
	 * 
	 * @return object
	 */
	public function next () {
		#/home/runner/haxe/versions/4.2.0/std/haxe/iterators/HashMapKeyValueIterator.hx:25: characters 3-25
		$key = $this->keys->next();
		#/home/runner/haxe/versions/4.2.0/std/haxe/iterators/HashMapKeyValueIterator.hx:26: characters 18-30
		$_this = $this->map->values;
		$key1 = $key->hashCode();
		#/home/runner/haxe/versions/4.2.0/std/haxe/iterators/HashMapKeyValueIterator.hx:26: characters 3-41
		return new _HxAnon_HashMapKeyValueIterator0(($_this->data[$key1] ?? null), $key);
	}
}

class _HxAnon_HashMapKeyValueIterator0 extends HxAnon {
	function __construct($value, $key) {
		$this->value = $value;
		$this->key = $key;
	}
}

Boot::registerClass(HashMapKeyValueIterator::class, 'haxe.iterators.HashMapKeyValueIterator');
