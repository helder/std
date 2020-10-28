<?php
/**
 * Generated by Haxe 4.0.5
 */

namespace helder\std\haxe\rtti;

use \helder\std\php\_Boot\HxAnon;
use \helder\std\php\Boot;
use \helder\std\php\_Boot\HxException;

/**
 * An API to access classes and enums metadata at runtime.
 * @see <https://haxe.org/manual/cr-rtti.html>
 */
class Meta {
	/**
	 * Returns the metadata that were declared for the given class fields or enum constructors
	 * 
	 * @param mixed $t
	 * 
	 * @return mixed
	 */
	public static function getFields ($t) {
		#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:92: characters 3-25
		$meta = Meta::getMeta($t);
		#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:93: characters 10-66
		if (($meta === null) || ($meta->fields === null)) {
			#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:93: characters 50-52
			return new HxAnon();
		} else {
			#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:93: characters 55-66
			return $meta->fields;
		}
	}

	/**
	 * @param mixed $t
	 * 
	 * @return object
	 */
	public static function getMeta ($t) {
		#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:60: characters 3-42
		return Boot::getMeta(Boot::dynamicField($t, 'phpClassName'));
	}

	/**
	 * Returns the metadata that were declared for the given class static fields
	 * 
	 * @param mixed $t
	 * 
	 * @return mixed
	 */
	public static function getStatics ($t) {
		#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:84: characters 3-25
		$meta = Meta::getMeta($t);
		#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:85: characters 10-68
		if (($meta === null) || ($meta->statics === null)) {
			#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:85: characters 51-53
			return new HxAnon();
		} else {
			#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:85: characters 56-68
			return $meta->statics;
		}
	}

	/**
	 * Returns the metadata that were declared for the given type (class or enum)
	 * 
	 * @param mixed $t
	 * 
	 * @return mixed
	 */
	public static function getType ($t) {
		#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:41: characters 3-25
		$meta = Meta::getMeta($t);
		#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:42: characters 10-60
		if (($meta === null) || ($meta->obj === null)) {
			#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:42: characters 47-49
			return new HxAnon();
		} else {
			#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:42: characters 52-60
			return $meta->obj;
		}
	}

	/**
	 * @param mixed $t
	 * 
	 * @return bool
	 */
	public static function isInterface ($t) {
		#/home/runner/haxe/versions/4.0.5/std/haxe/rtti/Meta.hx:54: characters 3-8
		throw new HxException("Something went wrong");
	}
}

Boot::registerClass(Meta::class, 'haxe.rtti.Meta');
