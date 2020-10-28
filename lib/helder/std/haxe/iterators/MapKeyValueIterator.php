<?php
/**
 * Generated by Haxe 4.1.3
 */

namespace helder\std\haxe\iterators;

use \helder\std\php\_Boot\HxAnon;
use \helder\std\php\Boot;
use \helder\std\haxe\IMap;

/**
 * This Key/Value iterator can be used to iterate across maps.
 */
class MapKeyValueIterator {
	/**
	 * @var object
	 */
	public $keys;
	/**
	 * @var IMap
	 */
	public $map;

	/**
	 * @param IMap $map
	 * 
	 * @return void
	 */
	public function __construct ($map) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/iterators/MapKeyValueIterator.hx:36: characters 3-17
		$this->map = $map;
		#/home/runner/haxe/versions/4.1.3/std/haxe/iterators/MapKeyValueIterator.hx:37: characters 3-25
		$this->keys = $map->keys();
	}

	/**
	 * See `Iterator.hasNext`
	 * 
	 * @return bool
	 */
	public function hasNext () {
		#/home/runner/haxe/versions/4.1.3/std/haxe/iterators/MapKeyValueIterator.hx:44: characters 3-24
		return $this->keys->hasNext();
	}

	/**
	 * See `Iterator.next`
	 * 
	 * @return object
	 */
	public function next () {
		#/home/runner/haxe/versions/4.1.3/std/haxe/iterators/MapKeyValueIterator.hx:51: characters 3-25
		$key = $this->keys->next();
		#/home/runner/haxe/versions/4.1.3/std/haxe/iterators/MapKeyValueIterator.hx:52: characters 3-41
		return new HxAnon([
			"value" => $this->map->get($key),
			"key" => $key,
		]);
	}
}

Boot::registerClass(MapKeyValueIterator::class, 'haxe.iterators.MapKeyValueIterator');
