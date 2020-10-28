<?php
/**
 * Generated by Haxe 4.0.5
 */

namespace helder\std\haxe;

use \helder\std\php\Boot;
use \helder\std\Array_hx;
use \helder\std\sys\io\File;
use \helder\std\sys\FileSystem;
use \helder\std\haxe\io\Bytes;
use \helder\std\haxe\io\Path;
use \helder\std\EReg;

/**
 * Resource can be used to access resources that were added through the
 * `--resource file@name` command line parameter.
 * Depending on their type they can be obtained as `String` through
 * `getString(name)`, or as binary data through `getBytes(name)`.
 * A list of all available resource names can be obtained from `listNames()`.
 */
class Resource {
	/**
	 * @param string $name
	 * 
	 * @return string
	 */
	public static function cleanName ($name) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:32: characters 3-45
		return (new EReg("[\\\\/:?\"*<>|]", ""))->replace($name, "_");
	}

	/**
	 * Retrieves the resource identified by `name` as an instance of
	 * haxe.io.Bytes.
	 * If `name` does not match any resource name, `null` is returned.
	 * 
	 * @param string $name
	 * 
	 * @return Bytes
	 */
	public static function getBytes ($name) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:70: characters 3-28
		$path = Resource::getPath($name);
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:71: characters 15-42
		clearstatcache(true, $path);
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:71: lines 71-74
		if (!file_exists($path)) {
			#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:72: characters 4-8
			return null;
		} else {
			#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:74: characters 4-30
			return File::getBytes($path);
		}
	}

	/**
	 * @return string
	 */
	public static function getDir () {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:36: characters 3-29
		$pathToRoot = "/../..";
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:38: characters 3-22
		$pathToRoot = ($pathToRoot??'null') . "/..";
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:39: lines 39-41
		$_g = 0;
		$_g1 = substr_count(Boot::getPrefix(), "\\");
		while ($_g < $_g1) {
			$i = $_g++;
			#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:40: characters 4-23
			$pathToRoot = ($pathToRoot??'null') . "/..";
		}

		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:43: characters 3-62
		return (dirname(__FILE__)??'null') . ($pathToRoot??'null') . "/res";
	}

	/**
	 * @param string $name
	 * 
	 * @return string
	 */
	public static function getPath ($name) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:48: characters 3-52
		return (Resource::getDir()??'null') . "/" . (Path::escape($name)??'null');
	}

	/**
	 * Retrieves the resource identified by `name` as a `String`.
	 * If `name` does not match any resource name, `null` is returned.
	 * 
	 * @param string $name
	 * 
	 * @return string
	 */
	public static function getString ($name) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:62: characters 3-28
		$path = Resource::getPath($name);
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:63: characters 15-42
		clearstatcache(true, $path);
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:63: lines 63-66
		if (!file_exists($path)) {
			#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:64: characters 4-8
			return null;
		} else {
			#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:66: characters 4-32
			return File::getContent($path);
		}
	}

	/**
	 * Lists all available resource names. The resource name is the name part
	 * of the `--resource file@name` command line parameter.
	 * 
	 * @return Array_hx
	 */
	public static function listNames () {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:53: characters 3-50
		$a = FileSystem::readDirectory(Resource::getDir());
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:54: lines 54-55
		if (($a->arr[0] ?? null) === ".") {
			#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:55: characters 4-13
			if ($a->length > 0) {
				$a->length--;
			}
			array_shift($a->arr);
		}
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:56: lines 56-57
		if (($a->arr[0] ?? null) === "..") {
			#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:57: characters 4-13
			if ($a->length > 0) {
				$a->length--;
			}
			array_shift($a->arr);
		}
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/Resource.hx:58: characters 10-60
		$result = [];
		$data = $a->arr;
		$_g_current = 0;
		$_g_length = count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			$result[] = Path::unescape($item);
		}

		return Array_hx::wrap($result);
	}
}

Boot::registerClass(Resource::class, 'haxe.Resource');
